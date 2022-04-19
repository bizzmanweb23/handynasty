<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_Model extends CI_Model
{
	function login($data)
	{
		$this->db->select('*');
		$this->db->from('branch');
		$this->db->where('name', $data['name']);
		$this->db->where('password', $data['password']);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
		
	 }
}	 
