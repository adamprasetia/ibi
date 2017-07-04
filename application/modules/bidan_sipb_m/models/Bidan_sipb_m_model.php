<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_sipb_m_model extends CI_Model {

	private $tbl_name = 'bidan_sipb_m';
	private $tbl_key = 'id';
	
	function query()
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as '.$this->tbl_name.'_tipe_name',
			'c.name as '.$this->tbl_name.'_status_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join($this->tbl_name.'_tipe b','a.tipe = b.id','left');
		$data[] = $this->db->join($this->tbl_name.'_status c','a.status = c.id','left');
		$search = $this->input->get('search');
		if($search)
			$data[] = $this->db->where('(a.nomor like "%'.$search.'%")');
		if($this->input->get('tipe') <> '')
			$data[] = $this->db->where('a.tipe',$this->input->get('tipe'));
		if($this->input->get('status') <> '')
			$data[] = $this->db->where('a.status',$this->input->get('status'));
		if($this->input->get('date_from') <> '' && $this->input->get('date_to') <> ''){
			$data[] = $this->db->where('a.tanggal >=',format_ymd($this->input->get('date_from')));
			$data[] = $this->db->where('a.tanggal <=',format_ymd($this->input->get('date_to')));
		}		
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('desc'));
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
	function check_double($bidan = '')
	{
		$this->db->where('bidan',$bidan);
		$this->db->where('status <>','1');
		$this->db->from($this->tbl_name);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function count_all($bidan_id)
	{
		$this->query();
		$this->db->where('bidan',$bidan_id);
		return $this->db->get()->num_rows();
	}
	function last($bidan = '',$tanggal = '')
	{
		$this->db->from($this->tbl_name);
		$this->db->where('bidan',$bidan);
		$this->db->where('status','1');
		if ($tanggal) {
			$this->db->where('tanggal <',$tanggal);			
		}
		$this->db->order_by('masa_berlaku','desc');
		$this->db->limit(1);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return '';
	}		
}