<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends MY_Controller 
{
	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Surat';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'surat';
		$this->load->model($this->data['module'].'_model','model');
		$this->load->helper('text');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit = $this->general->get_limit();
		$total = $this->model->count_all();
		
		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'surat_tipe_name' => 'Tipe Surat',
			'date_from' => 'Dari',
			'date_to' => 'Sampai',
			'nomor' => 'Nomor'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:150px');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->surat_tipe_name."&nbsp;|&nbsp;".anchor(base_url('files/surat/'.$r->id.'.pdf'),'Print',array('target'=>'_blank','class'=>'btn btn-default btn-xs'))."&nbsp;|&nbsp;".anchor('surat/preview/'.$r->id,'Preview',array('target'=>'_blank','class'=>'btn btn-default btn-xs')),
				format_dmy($r->date_from),
				format_dmy($r->date_to),
				$r->nomor,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),'Ubah',array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/delete/'.$r->id.get_query_string(),'Delete',array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['module'].'/index'.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search()
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit')
		);
		redirect($this->data['module'].'/index'.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tipe'=>$this->input->post('tipe'),
			'date_from'=>format_ymd($this->input->post('date_from')),
			'date_to'=>format_ymd($this->input->post('date_to')),
			'nomor'=>$this->input->post('nomor')
		);
		return $data;
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('tipe','Tipe Surat','trim');
		$this->form_validation->set_rules('date_from','Dari','trim');
		$this->form_validation->set_rules('date_to','Sampai','trim');
		$this->form_validation->set_rules('nomor','Nomor','trim');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['module'].'/add'.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$id = $this->model->add($data);
			$this->generate($id);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['module'].get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['row']->date_from = format_dmy($this->data['row']->date_from);
			$this->data['row']->date_to = format_dmy($this->data['row']->date_to);
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->model->edit($id,$data);
			$this->generate($id);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['module'].'/edit/'.$id.get_query_string());
		}
	}
	public function delete($id='')
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
		redirect($this->data['module'].get_query_string());
	}
	private function generate($id)
	{
		$this->load->library('surat_lib');
		$surat = $this->model->get_from_field('id',$id)->row();
		$this->surat_lib->generate($surat);
	}
	public function preview($id)
	{
		$this->load->library('surat_lib');
		$surat = $this->model->get_from_field('id',$id)->row();
		$this->surat_lib->generate($surat,"I");		
	}
}