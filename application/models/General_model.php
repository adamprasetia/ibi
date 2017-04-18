<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model {

	function get($table_name)
	{
		$this->db->where('status','1');
		return $this->db->get($table_name);	
	}
	function total($table_name = '',$filter = array())
	{
		$this->db->where('status','1');
		$this->db->where($filter);
		return $this->db->get($table_name)->num_rows();
	}
	function get_from_field($table_name,$field,$value)
	{
		$this->db->where($field,$value);
		return $this->db->get($table_name);	
	}			
	function get_from_field_row($table_name,$field,$value)
	{
		$this->db->where($field,$value);
		$this->db->limit(1);
		$result = $this->db->get($table_name);
		if($result->num_rows() > 0){
			return $result->row();		
		}
		return false;	
	}				
	function dropdown($tbl_name,$caption,$where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$result = $this->db->get($tbl_name)->result();
		$data[''] = '- '.$caption.' -';
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;
	}					
	function dropdown_with_nomor($tbl_name,$caption,$where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$result = $this->db->get($tbl_name)->result();
		$data[''] = '- '.$caption.' -';
		foreach($result as $r){
			$data[$r->id] = $r->nomor.' - '.$r->name;
		}
		return $data;
	}					
	function double_check($tabel,$field,$value,$id=false)
	{
		$this->db->where($field,$value);
		$this->db->from($tabel);
		$row = $this->db->get();
		if ($row->num_rows() > 0 && $row->row()->id!=$id) {
			return true;
		}
		return false;
	}	
	function add($table,$data)
	{
		$user_login = $this->session->userdata('user_login');
		$data['status'] = '1';
		$data['user_create'] = $user_login['id'];
		$data['date_create'] = date('Y-m-d H:i:s');		
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	function add_batch($table,$data){
		$this->db->insert_batch($table,$data);
	}

	function edit($table,$id,$data)
	{
		$user_login = $this->session->userdata('user_login');
		$data['user_update'] = $user_login['id'];
		$data['date_update'] = date('Y-m-d H:i:s');
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}
	function delete($table,$id)
	{
		$user_login = $this->session->userdata('user_login');
		$data['status'] = '2';
		$data['user_update'] = $user_login['id'];
		$data['date_update'] = date('Y-m-d H:i:s');		
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}
	function delete_from_field($table,$field,$id)
	{
		$this->db->where($field,$id);
		$this->db->delete($table);
	}
	function get_menu($parent = 0)
	{
		$this->db->where('parent',$parent);
		$this->db->order_by('order','asc');
		$result = $this->db->get('module');
		if ($result->num_rows() > 0) {
			return $result->result();		
		}
		return false;
	}
	function last($tbl_name = '', $bidan = '',$tanggal = '')
	{
		$this->db->from($tbl_name);
		$this->db->where('bidan',$bidan);
		$this->db->where('status','1');
		$this->db->where('tanggal <',$tanggal);
		$this->db->order_by('masa_berlaku','desc');
		$this->db->limit(1);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return '';
	}	
}