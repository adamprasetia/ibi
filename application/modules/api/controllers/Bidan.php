<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan extends CI_Controller
{
	private $index = 'api';

	function __construct()
	{
		parent::__construct();
		$this->load->model($this->index.'/model');
	}
	public function index()
	{
		$result = $this->model->result_bidan();
		$data = array();
		foreach($result as $row){
			$data[] = array(
				'id'=>$row->id,
				'name'=>$row->name
			);
		}
		echo json_encode($data);
	}
	public function get_by_id($id = '')
	{
		if ($id) {
			$result = $this->model->bidan_by_id($id);
			$result->tanggal_lahir = dateformatindo($result->tanggal_lahir,2);
			echo json_encode($result);			
		}
	}
}