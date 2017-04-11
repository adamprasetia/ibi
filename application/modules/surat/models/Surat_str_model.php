<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_str_model extends CI_Model
{
	private $tbl_name = 'bidan_str';
	private $tbl_key = 'id';
	
	function surat_total($date_from,$date_to)
	{
		$this->db->where('tanggal >=',$date_from);
		$this->db->where('tanggal <=',$date_to);
		$this->db->from($this->tbl_name);
		return $this->db->get()->num_rows();			
	}
	function baru($date_from,$date_to)
	{
		$this->db->select(array('a.*','b.*'));
		$this->db->where('a.tanggal >=',$date_from);
		$this->db->where('a.tanggal <=',$date_to);
		$this->db->where('a.tipe IN(1,3)');
		$this->db->from($this->tbl_name.' a');
		$this->db->join('bidan b','a.bidan=b.id','left');
		return $this->db->get()->result();
	}
	function perpanjang($date_from,$date_to)
	{
		$this->db->select(array('a.*','b.*'));
		$this->db->where('a.tanggal >=',$date_from);
		$this->db->where('a.tanggal <=',$date_to);
		$this->db->where('a.tipe IN(2)');
		$this->db->from($this->tbl_name.' a');
		$this->db->join('bidan b','a.bidan=b.id','left');
		return $this->db->get()->result();
	}
}