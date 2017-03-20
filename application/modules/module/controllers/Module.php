<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends MY_Controller 
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Module';
		$this->data['subtitle'] = 'List';
		$this->data['index'] = 'module';
		$this->load->model($this->data['index'].'_model','model');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit = $this->general->get_limit();
		$total = $this->model->count_all();

		$this->data['action'] = $this->data['index'].'/search'.get_query_string(null,'offset');
		$this->data['action_delete'] = $this->data['index'].'/delete'.get_query_string();
		$this->data['add_btn'] = anchor($this->data['index'].'/add',$this->lang->line('new'),array('role'=>'tab'));
		$this->data['list_btn'] = anchor($this->data['index'],$this->lang->line('list'),array('role'=>'tab'));
		$this->data['delete_btn'] = '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> '.$this->lang->line('delete_by_checked').'</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'name'=>$this->lang->line('name'),
			'url'=>'Url',
			'icon'=>'Icon',
			'parent'=>'Parent',
			'order'=>'Order'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['index'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = $this->lang->line('action');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->name,
				$r->url,
				$r->icon,
				$r->parent,
				$r->order,
				anchor($this->data['index'].'/edit/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['index'].'/delete/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['index'].get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['index'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search()
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit')
		);
		redirect($this->data['index'].get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'name'=>$this->input->post('name'),
			'url'=>$this->input->post('url'),
			'icon'=>$this->input->post('icon'),
			'parent'=>$this->input->post('parent'),
			'order'=>$this->input->post('order')
		);
		return $data;		
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('url','Url','trim');
		$this->form_validation->set_rules('icon','Icon','trim');
		$this->form_validation->set_rules('parent','Parent','trim');
		$this->form_validation->set_rules('order','Order','trim');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['index'].'/add'.get_query_string();
			$this->data['add_btn'] = anchor($this->data['index'].'/add',$this->lang->line('new'),array('role'=>'tab'));
			$this->data['list_btn'] = anchor($this->data['index'],$this->lang->line('list'),array('role'=>'tab'));
			$this->data['breadcrumb'] = $this->data['index'].get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['index'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['index'].'/add'.get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['add_btn'] = anchor(current_url(),$this->lang->line('edit'),array('role'=>'tab'));
			$this->data['list_btn'] = anchor($this->data['index'],$this->lang->line('list'),array('role'=>'tab'));
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['action'] = $this->data['index'].'/edit/'.$id.get_query_string();
			$this->data['breadcrumb'] = $this->data['index'].get_query_string();
			$this->data['heading'] = $this->lang->line('edit');
			$this->data['owner'] = owner($this->data['row']);
			$this->data['content'] = $this->load->view($this->data['index'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->user_login['id'];;
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['index'].'/edit/'.$id.get_query_string());
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
		redirect($this->data['index'].get_query_string());
	}
}