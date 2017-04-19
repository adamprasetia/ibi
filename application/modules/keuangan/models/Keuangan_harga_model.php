<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_harga_model extends CI_Model {

	private $tbl_name = 'keuangan_harga';
	private $tbl_key = 'id';

	function harga($jenis,$wilayah)
	{
		$this->db->from($this->tbl_name);
		$this->db->where('jenis',$jenis);
		if ($jenis=='8' || $jenis=='9') {
			$this->db->where('wilayah',$wilayah);
		}
		return $this->db->get();
	}
}