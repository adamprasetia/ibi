<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan extends MY_Controller {

	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Keuangan';
		$this->data['subtitle'] = 'Data pemasukan dan pengeluaran keuangan';
		$this->data['module'] = 'keuangan';
		$this->load->model($this->data['module'].'_model','model');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->model->count_all();

		$this->table->set_template(tbl_tmp());

		$head_data = array(
			'tanggal' => 'Tanggal',
			'tipe_name' => 'Tipe',
			'jenis_name' => 'Jenis',
			'bidan_name' => 'Bidan',
			'jumlah' => 'Jumlah',
			'ket' => 'Keterangan'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = $this->lang->line('action');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				dateformatindo($r->tanggal,2),
				$r->tipe_name,
				$r->jenis_name,
				$r->bidan_name,
				number_format($r->jumlah),
				$r->ket,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/delete/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = $this->data['module'].get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$data);
	}
	public function search()
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'jenis'=>$this->input->post('jenis'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect($this->data['module'].get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tanggal' => format_ymd($this->input->post('tanggal')),
			'tipe' => $this->input->post('tipe'),
			'jenis' => $this->input->post('jenis'),
			'bidan' => $this->input->post('bidan'),
			'jumlah' => format_uang($this->input->post('jumlah')),
			'ket' => $this->input->post('ket')
		);
		return $data;		
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('tipe','Tipe','required|trim');
		$this->form_validation->set_rules('jenis','Jenis','trim');
		$this->form_validation->set_rules('bidan','Bidan','trim');
		$this->form_validation->set_rules('jumlah','Jumlah','trim|required');
		$this->form_validation->set_rules('ket','Keterangan','trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['module'].'/add'.get_query_string();
			$this->data['owner'] = '';
			$data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$data);
		}else{
			$data = $this->_field();
			$this->general_model->add($this->data['module'],$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['module'].'/add'.get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['row'] = $this->general_model->get_from_field($this->data['module'],'id',$id)->row();
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string(); 
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$data);
		}else{
			$data = $this->_field();
			$this->general_model->edit($this->data['module'],$id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['module'].'/edit/'.$id.get_query_string());
		}
	}
	public function delete($id='')
	{
		if($id<>''){
			$this->general_model->delete($this->data['module'],$id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->general_model->delete($this->module,$c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['module'].get_query_string());
	}
}