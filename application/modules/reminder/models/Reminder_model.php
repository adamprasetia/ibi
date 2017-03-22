<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_model extends CI_Model
{	
	function kta_expire()
	{	
		$table = '(select a.*,c.name as bidan_name from (select * from bidan_kta) a left join (select * from bidan_kta) b on a.bidan=b.bidan and a.masa_berlaku < b.masa_berlaku left join bidan c on a.bidan = c.id where b.masa_berlaku is null) x';
		$query = 'select * from '.$table.' where x.masa_berlaku <= DATE_ADD(\''.date('Y-m-d').'\',INTERVAL 2 MONTH) and x.status = 1 order by x.masa_berlaku';
		return $this->db->query($query);
	}
}