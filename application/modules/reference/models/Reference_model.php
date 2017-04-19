<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reference_model extends CI_Model {

	private $tbl_name;
	private $tbl_key = 'id';
	
	function __construct()
	{
		$this->tbl_name = $this->uri->segment(2);
	}
	function query()
	{
		$search = $this->input->get('search');
		if($search <> ''){
			$data[] = $this->db->where('name like "%'.$search.'%"');
		}				
		$data[] = $this->db->order_by($this->general->get_order_column('id'),$this->general->get_order_type('asc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	function get()
	{
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get($this->tbl_name);
	}
	function count_all()
	{
		$this->query();
		return $this->db->get($this->tbl_name)->num_rows();
	}
}