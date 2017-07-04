<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_pelatihan_model extends CI_Model
{
	private $tbl_name = 'bidan_pelatihan';
	private $tbl_key = 'id';
	
	function query()
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as pelatihan_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('pelatihan b','a.pelatihan = b.id','left');
		$search = $this->input->get('search');
		if($search)
			$data[] = $this->db->where('(b.name like "%'.$search.'%" or a.alamat like "%'.$search.'%" or a.nomor like "%'.$search.'%")');
		$data[] = $this->db->order_by($this->general->get_order_column('a.tanggal'),$this->general->get_order_type('desc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	function get($bidan_id)
	{
		$this->query();
		$this->db->where('bidan',$bidan_id);
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	function count_all($bidan_id)
	{
		$this->query();
		$this->db->where('bidan',$bidan_id);
		return $this->db->get()->num_rows();
	}
}