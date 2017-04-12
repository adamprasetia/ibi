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
		$this->db->select(
			array(
				'a.*',
				'b.*',
				'(select nomor from bidan_str where bidan=a.bidan and tanggal < a.tanggal and status = 1 order by tanggal desc limit 1) as nomor_sebelum',
				'(select masa_berlaku from bidan_str where bidan=a.bidan and tanggal < a.tanggal and status = 1 order by tanggal desc limit 1) as masa_berlaku_sebelum'
			)
		);
		$this->db->where('a.tanggal >=',$date_from);
		$this->db->where('a.tanggal <=',$date_to);
		$this->db->where('a.tipe IN(2)');
		$this->db->from($this->tbl_name.' a');
		$this->db->join('bidan b','a.bidan=b.id','left');
		$this->db->order_by('masa_berlaku_sebelum','asc');
		return $this->db->get()->result();
	}
	function sebelumnya($bidan = '',$tanggal = '')
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