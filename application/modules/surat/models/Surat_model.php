<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_model extends CI_Model
{
	private $tbl_name = 'surat';
	private $tbl_key = 'id';
	
	function query()
	{	
		$data[] = $this->db->select(array('a.*','b.name as surat_tipe_name'));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('surat_tipe b','a.tipe=b.id','left');
		$data[] = $this->search();
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('desc'));
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
		return $this->db->get($this->tbl_name);
	}
	function get_from_field($field,$value)
	{
		$this->db->where($field,$value);
		return $this->db->get($this->tbl_name);	
	}	
	function add($data)
	{
		$this->db->insert($this->tbl_name,$data);
		return $this->db->insert_id();
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
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
	function search()
	{
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(nomor like "%'.$result.'%")');
		}		
	}
}