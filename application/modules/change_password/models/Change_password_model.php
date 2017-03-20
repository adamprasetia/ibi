<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password_model extends CI_Model 
{
	function change($id,$pass)
	{
		$data = array(
			'password'=>$pass
		);
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
}