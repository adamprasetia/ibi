<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	
	private $tbl_name = 'users';
	private $tbl_key 	= 'id';

	public function query()
	{
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as level_name',
			'c.name as status_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join($this->tbl_name.'_level b','a.level = b.id');
		$data[] = $this->db->join($this->tbl_name.'_status c','a.status = c.id');
		$search = $this->input->get('search');
		if($search)
			$data[] = $this->db->where('(a.name like "%'.$search.'%" or a.username like "%'.$search.'%")');
		if($this->input->get('level') <> '')
			$data[] = $this->db->where('a.level',$this->input->get('level'));
		if($this->input->get('status') <> '')
			$data[] = $this->db->where('a.status',$this->input->get('status'));
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('asc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	public function get(){
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	public function count_all(){
		$this->query();
		return $this->db->get()->num_rows();
	}
}