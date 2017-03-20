<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MY_Controller 
{
	public function index()
	{
		$this->form_validation->set_rules('old_pass','Old Password','required|trim|callback__check_old_pass');
		$this->form_validation->set_rules('new_pass','New Password','required|trim');
		$this->form_validation->set_rules('con_pass','Confirm Password','required|trim|matches[new_pass]');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		if($this->form_validation->run()===false){
			$data['content'] = $this->load->view('change_password','',true);
			$this->load->view('template_view',$data);
		}else{
			$id = $this->user_login['id'];
			$this->session->set_flashdata('alert','<div class="alert alert-success">Change password success</div>');
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
				$this->form_validation->set_message('_check_old_pass', 'Old Password Failed!!!');					
				return false;
			}
		}				
		return false;
	}
}
