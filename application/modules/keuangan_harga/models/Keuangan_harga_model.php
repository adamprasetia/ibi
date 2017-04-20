<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_harga_model extends CI_Model {

	private $tbl_name = 'keuangan_harga';
	private $tbl_key = 'id';

	private function query()
	{
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as jenis_name',
			'c.name as wilayah_name',
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('keuangan_jenis b','a.jenis = b.id','left');
		$data[] = $this->db->join('wilayah c','a.wilayah = c.id','left');
		if($this->input->get('search') <> '')
			$data[] = $this->db->where('(a.harga like "%'.$this->input->get('search').'%")');
		if($this->input->get('jenis') <> '')
			$data[] = $this->db->where('a.jenis',$this->input->get('jenis'));
		if($this->input->get('wilayah') <> '')
			$data[] = $this->db->where('a.wilayah',$this->input->get('wilayah'));
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('desc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	public function get()
	{
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	public function count_all(){
		$this->query();
		return $this->db->get()->num_rows();
	}
	public function harga($jenis,$wilayah)
	{
		$this->db->from($this->tbl_name);
		$this->db->where('jenis',$jenis);
		if ($jenis=='8' || $jenis=='9') {
			$this->db->where('wilayah',$wilayah);
		}
		return $this->db->get();
	}
}