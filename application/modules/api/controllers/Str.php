<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Str extends CI_Controller
{
	private $module = 'api';

	function __construct()
	{
		parent::__construct();
		$this->load->model('bidan_str/bidan_str_model','model');
	}
	public function last()
	{
		$bidan = $this->input->post('bidan');
		$tanggal = format_ymd($this->input->post('tanggal'));
		$result = $this->model->last($bidan,$tanggal);
		if ($result) {
			$result->masa_berlaku = format_dmy($result->masa_berlaku);
			echo json_encode($result);
		}
	}
}