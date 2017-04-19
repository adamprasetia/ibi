<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_model extends CI_Model {

	private $tbl_name = 'keuangan';
	private $tbl_key 	= 'id';

	private function query()
	{
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as tipe_name',
			'c.name as jenis_name',
			'd.name as bidan_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join($this->tbl_name.'_tipe b','a.tipe = b.id');
		$data[] = $this->db->join($this->tbl_name.'_jenis c','a.jenis = c.id');
		$data[] = $this->db->join('bidan d','a.bidan = d.id');
		if($this->input->get('search') <> '')
			$data[] = $this->db->where('(a.jumlah like "%'.$this->input->get('search').'%")');
		if($this->input->get('tipe') <> '')
			$data[] = $this->db->where('a.tipe',$this->input->get('tipe'));
		if($this->input->get('jenis') <> '')
			$data[] = $this->db->where('a.jenis',$this->input->get('jenis'));
		if($this->input->get('date_from') <> '' && $this->input->get('date_to') <> ''){
			$data[] = $this->db->where('a.tanggal >=',format_ymd($this->input->get('date_from')));
			$data[] = $this->db->where('a.tanggal <=',format_ymd($this->input->get('date_to')));
		}				
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
}