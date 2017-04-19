<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends CI_Model {

	private $tbl_name = 'module';
	private $tbl_key = 'id';
	
	function query()
	{
		$data[] = $this->db->from($this->tbl_name);
		$search = $this->input->get('search');
		if($search <> ''){
			$data[] = $this->db->where('(name like "%'.$search.'%" OR url like "%'.$search.'%")');
		}		
		$data[] = $this->db->order_by($this->general->get_order_column('id'),$this->general->get_order_type('asc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	function get()
	{
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
}