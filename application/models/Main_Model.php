<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model
{
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
		return true;
	}
	function update($id,$idnumber,$data,$table)
	{
		$this->db->where($id,$idnumber);
		$this->db->update($table,$data);
		return true;
	}
	function delete($id,$idnumber,$table)
	{
        $this->db->where($id, $idnumber);
        $this->db->delete($table);
        return true;
	}
}