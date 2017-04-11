<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {	
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_login')==''){
			redirect('login');
		}
		$module = $this->uri->segment(1);
		if ($module == 'reference') {
			$module .= '/'.$this->uri->segment(2);
		}

		if (!in_array($module, $this->session->userdata('user_login')['url']) 
			&& !in_array($module,array('block',
				'change_password',
				'home/logout',
			))) {
			redirect('block');
		}
		$this->menu = $this->general->get_menu();
		$this->user_login = $this->session->userdata('user_login');
		$this->lang->load('general', 'indonesia');
	}
}
