<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_kta_model extends CI_Model {

	private $tbl_name = 'bidan_kta';

	private function query()
	{
		$data[] = $this->db->from('(select a.*,c.id as bidan_id,c.name as bidan_name from (select * from '.$this->tbl_name.') a left join (select * from '.$this->tbl_name.') b on a.bidan=b.bidan and a.tanggal < b.tanggal left join bidan c on a.bidan = c.id where b.tanggal is null) a');
		$search = $this->input->get('search');
		if ($search) {
			$data[] = $this->db->where('(a.bidan_name like "%'.$search.'%" or a.masa_berlaku like "%'.$search.'%")');
		}
		$data[] = $this->db->where('a.masa_berlaku <>','0');
		$data[] = $this->db->where('a.masa_berlaku <=',(date('Y')+1));
		$data[] = $this->db->order_by($this->general->get_order_column('a.masa_berlaku'),$this->general->get_order_type('asc'));
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