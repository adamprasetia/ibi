<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_jenis_model extends CI_Model {

	private $tbl_name = 'keuangan_jenis';
	private $tbl_key 	= 'id';

	private function query($tipe = '')
	{
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as tipe_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('keuangan_tipe b','a.tipe = b.id');
		if($this->input->get('search'))
			$data[] = $this->db->where('(a.jumlah like "%'.$this->input->get('search').'%")');
		if($this->input->get('tipe'))
			$data[] = $this->db->where('a.tipe',$this->input->get('tipe'));
		if($tipe)
			$data[] = $this->db->where('a.tipe',$tipe);
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('desc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	public function get($tipe = '')
	{
		$this->query($tipe);
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	public function count_all(){
		$this->query();
		return $this->db->get()->num_rows();
	}
}