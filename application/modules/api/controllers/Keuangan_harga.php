<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_harga extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('keuangan/keuangan_harga_model','model');
	}
	public function index()
	{
		$jenis = $this->input->post('jenis');
		$wilayah = $this->input->post('wilayah');
		$result = $this->model->harga($jenis,$wilayah)->row();
		if ($result) {
			echo json_encode($result);
		}
	}
}