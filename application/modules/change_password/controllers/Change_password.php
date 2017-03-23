<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MY_Controller 
{	
	private $data = array();
	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Ganti Kata Kunci';
		$this->data['subtitle'] = '';
		$this->data['module'] = 'change_password';
	}
	public function index()
	{
		$this->form_validation->set_rules('old_pass','Password Lama','required|trim|callback__check_old_pass');
		$this->form_validation->set_rules('new_pass','Password Baru','required|trim');
		$this->form_validation->set_rules('con_pass','Konfirmasi Password Baru','required|trim|matches[new_pass]');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		if($this->form_validation->run()===false){
			$this->data['content'] = $this->load->view('change_password',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$id = $this->user_login['id'];
			$this->session->set_flashdata('alert','<div class="alert alert-success">Ganti kata kunci berhasil</div>');
			$this->load->model('change_password_model');
			$this->change_password_model->change($id,md5($this->input->post('new_pass')));
			redirect('change_password');
		}
	}
	public function _check_old_pass()
	{
		$result = $this->general_model->get_from_field('users','id',$this->user_login['id']);
		if($result->num_rows() > 0){
			$old_pass = $result->row()->password;
			if($old_pass == md5($this->input->post('old_pass'))){
				return true;
			}else{
				$this->form_validation->set_message('_check_old_pass', 'Kata kunci lama salah!!!');					
				return false;
			}
		}				
		return false;
	}
}
