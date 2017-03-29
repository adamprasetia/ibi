<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model 
{
	function result($tbl_name = '')
	{
		$q = $this->input->get('q');
		if($q){
			$this->db->where('(code like "%'.$q.'%" OR name like "%'.$q.'%")');
		}
		$this->db->from($tbl_name);
		$this->db->limit(10);
		return $this->db->get()->result();
	}
	function result_bidan()
	{
		$q = $this->input->get('q');
		if($q){
			$this->db->where('(nomor like "%'.$q.'%" OR name like "%'.$q.'%")');
		}
		$this->db->from('bidan');
		$this->db->limit(10);
		return $this->db->get()->result();
	}	
	function bidan_by_id($id)
	{
		$this->db->select(array(
			'a.*',
			'b.name as golongan_darah_name',
			'c.name as pendidikan_name'
		));
		$this->db->from('bidan a');
		$this->db->join('golongan_darah b','a.golongan_darah=b.id','left');
		$this->db->join('pendidikan c','a.pendidikan=c.id','left');
		$this->db->where('a.id',$id);
		$this->db->limit(1);
		return $this->db->get()->row();
	}
	function str_before($bidan = '',$tanggal = '')
	{
		$this->db->from('bidan_str');
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