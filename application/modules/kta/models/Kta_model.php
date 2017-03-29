<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kta_model extends CI_Model
{
	private $tbl_name = 'bidan_kta';
	private $tbl_key = 'id';
	
	function query()
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as '.$this->tbl_name.'_tipe_name',
			'c.name as '.$this->tbl_name.'_status_name',
			'd.name as bidan_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join($this->tbl_name.'_tipe b','a.tipe = b.id','left');
		$data[] = $this->db->join($this->tbl_name.'_status c','a.status = c.id','left');
		$data[] = $this->db->join('bidan d','a.bidan = d.id','left');
		$data[] = $this->search();
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
	function get()
	{
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	function check_double()
	{
		$bidan = $this->input->post('bidan');

		$this->db->where('bidan',$bidan);
		$this->db->where('status <>','1');
		$this->db->from($this->tbl_name);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function add($data)
	{
		$this->db->insert($this->tbl_name,$data);
		return $this->db->insert_id();
	}
	function edit($id,$data)
	{
		$this->db->where($this->tbl_key,$id);
		$this->db->update($this->tbl_name,$data);
	}
	function delete($id)
	{
		$this->db->where($this->tbl_key,$id);
		$this->db->delete($this->tbl_name);
	}
	function get_from_field($field,$value,$param=0)
	{
		if($param==1){$this->query();}
		$this->db->where($field,$value);
		return $this->db->get($this->tbl_name);	
	}
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
	function search()
	{
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(a.nomor like "%'.$result.'%" or d.name like "%'.$result.'%")');
		}		
	}		
}