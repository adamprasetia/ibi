<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_kta extends MY_Controller {

	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'KTA Reminder';
		$this->data['subtitle'] = '';
		$this->data['module'] = 'reminder_kta';
		$this->load->model($this->data['module'].'_model','model');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->model->count_all();

		$this->table->set_template(tbl_tmp());

		$head_data = array(
			'bidan_name' => 'Nama',
			'masa_berlaku' => 'Masa Berlaku'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				anchor(site_url('bidan/kta/index/'.$r->bidan_id),$r->bidan_name),
				'<span class="badge '.reminder_badge_year($r->masa_berlaku).'">'.$r->masa_berlaku.'</span>'
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
			'limit'=>$this->input->post('limit')
		);
		redirect($this->data['module'].get_query_string($data));		
	}
}