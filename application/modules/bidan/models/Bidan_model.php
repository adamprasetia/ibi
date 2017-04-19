<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_model extends CI_Model
{
	private $tbl_name = 'bidan';
	private $tbl_key = 'id';
	
	function query($filter = array())
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as pendidikan_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('pendidikan b','a.pendidikan=b.id','left');
		$search = $this->input->get('search');
		if($search <> '')
			$data[] = $this->db->where('(a.nomor like "%'.$search.'%" or a.name like "%'.$search.'%")');
		if($this->input->get('q'))
			$data[] = $this->db->where('a.name like "%'.$this->input->get('q').'%"');
		if($this->input->get('pendidikan') <> '')
			$data[] = $this->db->where('a.pendidikan',$this->input->get('pendidikan'));
		if($this->input->get('status_pegawai') <> '')
			$data[] = $this->db->where('a.status_pegawai',$this->input->get('status_pegawai'));
		if ($filter) {
			foreach ($filter as $row) {
				$data[] = $this->db->where($row['field'],$row['value']);	
			}
		}
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('desc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	function get($filter = array())
	{
		$this->query($filter);
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
}