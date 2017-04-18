<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_model extends CI_Model
{	
	function kta_expire()
	{	
		$table = '(select a.*,c.id as bidan_id,c.name as bidan_name from (select * from bidan_kta) a left join (select * from bidan_kta) b on a.bidan=b.bidan and a.masa_berlaku < b.masa_berlaku left join bidan c on a.bidan = c.id where b.masa_berlaku is null) x';
		$query = 'select * from '.$table.' where x.masa_berlaku <> 0 && x.masa_berlaku <= \''.(date('Y')+1).'\' order by x.masa_berlaku';
		return $this->db->query($query);
		// $this->db->where('kta_date <=',date('Y-m-d',strtotime("+2 month",time())));
		// $this->db->from('bidan');
		// return $this->db->get();
	}
	function str_expire()
	{	
		$table = '(select a.*,c.id as bidan_id,c.name as bidan_name from (select * from bidan_str) a left join (select * from bidan_str) b on a.bidan=b.bidan and a.masa_berlaku < b.masa_berlaku left join bidan c on a.bidan = c.id where b.masa_berlaku is null) x';
		$query = 'select * from '.$table.' where x.masa_berlaku <= DATE_ADD(\''.date('Y-m-d').'\',INTERVAL 2 MONTH) order by x.masa_berlaku';
		return $this->db->query($query);
		// $this->db->where('kta_date <=',date('Y-m-d',strtotime("+2 month",time())));
		// $this->db->from('bidan');
		// return $this->db->get();
	}
}