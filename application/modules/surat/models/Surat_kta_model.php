<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_kta_model extends CI_Model
{
	private $tbl_name = 'bidan_kta';
	private $tbl_key = 'id';
	
	function surat_total($date_from,$date_to)
	{
		$this->db->where('tanggal >=',$date_from);
		$this->db->where('tanggal <=',$date_to);
		$this->db->from($this->tbl_name);
		return $this->db->get()->num_rows();			
	}
	function bidan($date_from,$date_to)
	{
		$this->db->select(array('a.*','b.*','c.name as golongan_darah_name','d.name as bidan_kta_tipe_name'));
		$this->db->where('a.tanggal >=',$date_from);
		$this->db->where('a.tanggal <=',$date_to);
		$this->db->from($this->tbl_name.' a');
		$this->db->join('bidan b','a.bidan=b.id','left');
		$this->db->join('golongan_darah c','b.golongan_darah=c.id','left');
		$this->db->join('bidan_kta_tipe d','a.tipe=d.id','left');
		return $this->db->get()->result();
	}
}