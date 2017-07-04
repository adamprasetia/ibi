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
		$this->load->model('bidan/bidan_model');
		$this->data['kta'] = $this->bidan_model->punya_kta()->num_rows();
		$this->data['str'] = $this->bidan_model->punya_str()->num_rows();
		$this->data['sipb_p'] = $this->bidan_model->punya_sipb_p()->num_rows();
		$this->data['sipb_m'] = $this->bidan_model->punya_sipb_m()->num_rows();
		$this->data['content'] = $this->load->view('home_view',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function logout()
	{
		$this->session->unset_userdata('user_login');
		redirect('login');
	}
	public function wilayah()
	{
		$this->load->model('bidan/bidan_model');
		$data = $this->bidan_model->chart_wilayah()->result_array();
		echo json_encode($data);		
	}
	public function kta()
	{
		$this->load->model('bidan/bidan_model');
		$data = $this->bidan_model->chart_kta()->result_array();
		echo json_encode($data);		
	}
	public function str()
	{
		$this->load->model('bidan/bidan_model');
		$data = $this->bidan_model->chart_str()->result_array();
		echo json_encode($data);		
	}
	public function sipb_p()
	{
		$this->load->model('bidan/bidan_model');
		$data = $this->bidan_model->chart_sipb_p()->result_array();
		echo json_encode($data);		
	}
	public function sipb_m()
	{
		$this->load->model('bidan/bidan_model');
		$data = $this->bidan_model->chart_sipb_m()->result_array();
		echo json_encode($data);		
	}
}