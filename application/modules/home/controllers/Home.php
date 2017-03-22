<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$home_view['total_bidan'] = $this->general_model->get('bidan')->num_rows();
		$data['content'] = $this->load->view('home_view',$home_view,true);
		$this->load->view('template_view',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('user_login');
		redirect('login');
	}
}