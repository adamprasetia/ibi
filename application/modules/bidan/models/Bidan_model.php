<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_model extends CI_Model
{
	private $tbl_name = 'bidan';
	private $tbl_key = 'id';
	
	function query()
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as pendidikan_name',
			'c.name as status_pegawai_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('pendidikan b','a.pendidikan = b.id','left');
		$data[] = $this->db->join('status_pegawai c','a.status_pegawai = c.id','left');
		$data[] = $this->search();
		if($this->input->get('pendidikan') <> '')
			$data[] = $this->db->where('a.pendidikan',$this->input->get('pendidikan'));
		if($this->input->get('status_pegawai') <> '')
			$data[] = $this->db->where('a.status_pegawai',$this->input->get('status_pegawai'));
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
	function get_last_id()
	{
		$this->db->limit(1);
		$this->db->order_by('id','desc');
		$result = $this->db->get($this->tbl_name);
		if ($result->num_rows()) {
			return str_pad($result->row()->id+1,3,'0', STR_PAD_LEFT);
		}
		return '001';
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
			return $this->db->where('(a.nomor like "%'.$result.'%" and a.name like "%'.$result.'%")');
		}		
	}		
}