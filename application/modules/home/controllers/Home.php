<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	private $data = array();
	function __construct()
	{
		parent::__construct();
		$this->data['title'] = config_item('app_name');
		$this->data['subtitle'] = 'Beranda';
		$this->data['module'] = 'home';		
	}
	public function index()
	{
		$this->data['total_bidan'] = $this->general_model->get('bidan')->num_rows();
		$this->data['content'] = $this->load->view('home_view',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function logout()
	{
		$this->session->unset_userdata('user_login');
		redirect('login');
	}
}