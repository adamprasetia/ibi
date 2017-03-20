<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends CI_Model
{
	private $tbl_name = 'module';
	private $tbl_key = 'id';
	
	function query()
	{
		$data[] = $this->search();
		$data[] = $this->db->from($this->tbl_name);
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
	function get_all()
	{
		$this->query();
		return $this->db->get();
	}
	function add($data)
	{
		$this->db->insert($this->tbl_name,$data);
	}
	function edit($id,$data)
	{
		$this->db->where($this->tbl_key,$id);
		$this->db->update($this->tbl_name,$data);
	}
	function delete($id)
	{
		$this->db->where($this->tbl_key,$id);
		$this->db->delete($this->tbl_name);
	}
	function get_from_field($field,$value,$param=0)
	{
		if($param==1){$this->query();}
		$this->db->where($field,$value);
		return $this->db->get($this->tbl_name);	
	}
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
	function search()
	{
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(name like "%'.$result.'%" OR url like "%'.$result.'%")');
		}		
	}		
}