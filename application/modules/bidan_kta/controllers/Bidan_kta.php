<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_kta extends MY_Controller 
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'KTA';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'bidan';
		$this->data['modulesub'] = 'kta';
		$this->data['index'] = $this->data['module'].'/'.$this->data['modulesub'];
		$this->data['view'] = 'bidan_kta';
		$this->load->model($this->data['view'].'_model','model');
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
			'tanggal' => 'Tanggal Permohonan',
			'bidan_'.$this->data['modulesub'].'_tipe_name' => 'Jenis Pengajuan',
			'bidan_'.$this->data['modulesub'].'_status_name' => 'Status'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['index'].'/index/'.$bidan_id.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:110px');
		$this->table->set_heading($heading);
		$result = $this->model->get($bidan_id)->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				dateformatindo($r->tanggal,2),
				$r->{'bidan_'.$this->data['modulesub'].'_tipe_name'},
				$r->{'bidan_'.$this->data['modulesub'].'_status_name'},
				anchor($this->data['index'].'/edit/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['index'].'/delete/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['index'].'/index/'.$bidan_id.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['view'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search($bidan_id)
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'status'=>$this->input->post('status'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect($this->data['index'].'/index/'.$bidan_id.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tipe'=>$this->input->post('tipe'),
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'masa_berlaku'=>$this->input->post('masa_berlaku'),
			'status'=>$this->input->post('status')
		);
		if ($this->input->post('syarat')) {
			$data['syarat'] = implode(',',$this->input->post('syarat'));
		}
		return $data;
	}
	public function _check_double($tipe = '',$bidan_id = '')
	{
		$result = $this->model->check_double($bidan_id);
		if ($result) {
			$this->form_validation->set_message('_check_double', 'Sudah terdaftar di pengajuan '.$this->data['title']);	
			return FALSE;
		}
		return TRUE;
	}	
	private function _set_rules($bidan_id = '')
	{
		// echo $bidan_id;exit;
		if ($bidan_id) {
			$this->form_validation->set_rules('tipe','Jenis Pengajuan','required|trim|callback__check_double['.$bidan_id.']');
		}else{
			$this->form_validation->set_rules('tipe','Jenis Pengajuan','required|trim');			
		}		
		$this->form_validation->set_rules('tanggal','Tanggal Permohonan','required|trim');
		$this->form_validation->set_rules('masa_berlaku','Masa Berlaku','trim');
		$this->form_validation->set_rules('status','Status','required|trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');			
	}
	public function add($bidan_id)
	{
		$this->_set_rules($bidan_id);
		if($this->form_validation->run()===false){
			$this->data['syarat'] = $this->general_model->get('bidan_'.$this->data['modulesub'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['action'] = $this->data['index'].'/add/'.$bidan_id.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['view'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['index'].'/index/'.$bidan_id.get_query_string());
		}
	}
	public function edit($bidan_id,$id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['syarat'] = $this->general_model->get('bidan_'.$this->data['modulesub'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['row']->tanggal = format_dmy($this->data['row']->tanggal);
			$this->data['row']->syarat = explode(',', $this->data['row']->syarat);
			$this->data['action'] = $this->data['index'].'/edit/'.$bidan_id.'/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['view'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['index'].'/edit/'.$bidan_id.'/'.$id.get_query_string());
		}
	}
	public function delete($bidan_id,$id='')
	{
		if($id<>''){
			$this->model->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->model->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['index'].'/index/'.$bidan_id.get_query_string());
	}
}