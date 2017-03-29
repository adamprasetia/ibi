<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Block extends MY_Controller 
{
	private $data = array();

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$block_view['title'] = 'Blocked';
		$block_view['subtitle'] = '';
		$data['content'] = $this->load->view('block_view',$block_view,true);
		$this->load->view('template_view',$data);
	}
}