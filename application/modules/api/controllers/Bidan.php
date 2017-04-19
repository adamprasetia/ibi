<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan extends CI_Controller
{
	private $index = 'api';

	function __construct()
	{
		parent::__construct();
		$this->load->model('bidan/bidan_model','model');
	}
	public function index()
	{
		$result = $this->model->get()->result();
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
		$filter[] = array('field'=>'a.id','value'=>$id);
		if ($id) {
			$result = $this->model->get($filter)->row();
			$result->tanggal_lahir = dateformatindo($result->tanggal_lahir,2);
			echo json_encode($result);			
		}
	}
}