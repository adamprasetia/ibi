<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_pelatihan extends MY_Controller {

	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Pelatihan';
		$this->data['subtitle'] = 'Pelatihan yang pernah diikuti oleh bidan';
		$this->data['module'] = 'bidan_pelatihan';
		$this->data['url'] = 'bidan/pelatihan';
		$this->load->model($this->data['module'].'_model','model');
		$this->load->helper('text');
	}
	public function index($bidan_id)
	{
		$offset = $this->general->get_offset();
		$limit = $this->general->get_limit();
		$total = $this->model->count_all($bidan_id);
		
		$this->data['bidan_id'] = $bidan_id;
		$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'pelatihan_name' => 'Nama Pelatihan',
			'tanggal' => 'Tanggal Pelatihan',
			'alamat' => 'Alamat',
			'nomor' => 'Nomor Sertifikat'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['url'].'/index/'.$bidan_id.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:110px');
		$this->table->set_heading($heading);
		$result = $this->model->get($bidan_id)->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->pelatihan_name,
				dateformatindo($r->tanggal,2),
				$r->alamat,
				$r->nomor,
				anchor($this->data['url'].'/edit/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['url'].'/delete/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['url'].'/index/'.$bidan_id.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search($bidan_id)
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit')
		);
		redirect($this->data['url'].'/index/'.$bidan_id.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'pelatihan'=>$this->input->post('pelatihan'),
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'alamat'=>$this->input->post('alamat'),
			'nomor'=>$this->input->post('nomor')
		);
		return $data;
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('pelatihan','Nama Pelatihan','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal Pelatihan','trim');
		$this->form_validation->set_rules('alamat','Alamat','trim');
		$this->form_validation->set_rules('nomor','Nomor Sertifikat','trim');
	}
	public function add($bidan_id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['action'] = $this->data['url'].'/add/'.$bidan_id.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$this->general_model->add($this->data['module'],$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['url'].'/index/'.$bidan_id.get_query_string());
		}
	}
	public function edit($bidan_id,$id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['row'] = $this->general_model->get_from_field($this->data['module'],'id',$id)->row();
			$this->data['action'] = $this->data['url'].'/edit/'.$bidan_id.'/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$this->general_model->edit($this->data['module'],$id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['url'].'/edit/'.$bidan_id.'/'.$id.get_query_string());
		}
	}
	public function delete($bidan_id,$id='')
	{
		if($id<>''){
			$this->general_model->delete($this->data['module'],$id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->general_model->delete($this->data['module'],$c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['url'].'/index/'.$bidan_id.get_query_string());
	}
}