<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		// $menu = $this->general->get_menu();
		// echo "<pre>";var_dump($menu);exit;
		// echo "<pre>";var_dump($this->user_login['url']);exit;
		$data['content'] = $this->load->view('home_view','',true);
		$this->load->view('template_view',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('user_login');
		redirect('login');
	}
}