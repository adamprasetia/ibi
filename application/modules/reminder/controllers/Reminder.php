<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder extends MY_Controller 
{
	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Reminder';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'reminder';
		$this->load->model($this->data['module'].'_model','model');
	}
	public function index()
	{
		$this->data['kta_expire'] = $this->model->kta_expire()->result();
		// echo "<pre>";var_dump($this->model->kta_expire()->result());exit;
		$this->data['content'] = $this->load->view('reminder_view',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
}