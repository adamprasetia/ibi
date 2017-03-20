<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['index'] = 'login';
		$this->load->model($this->data['index'].'_model','model');
		$this->lang->load('general', 'indonesia');
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('username','Username','trim|callback__login_check');
		$this->form_validation->set_rules('password','Password','trim');
	}
	public function _login_check()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username == '' || $password == ''){
			$this->form_validation->set_message('_login_check','<div class="alert alert-danger">'.$this->lang->line('login_required').'</div>');
			return false;			
		}
		$result = $this->model->check_login($username,md5($password));
		if($result->num_rows() > 0){
			$url = $this->model->get_module_url($result->row()->module);
			$user_login = $result->row_array();
			$user_login['url'] = $url;
			$this->session->set_userdata('user_login',$user_login);
			return true;
		}
		$this->form_validation->set_message('_login_check','<div class="alert alert-danger">'.$this->lang->line('login_failed').'</div>');
		return false;
	}
	public function index()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->load->view($this->data['index'].'_view');
		}else{
			$username = $this->input->post('username');
			$users = $this->general_model->get_from_field('users','username',$username)->row();
			$this->model->set_date_login($users->id);
			redirect('home');
		}		
	}
}