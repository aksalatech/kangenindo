<?php
class Brand_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_brand()
	{
		$query=$this->db->query("SELECT * FROM msbrand");
		return $query->result();
	}

	function get_active_brand()
	{
		$query=$this->db->query("SELECT * FROM msbrand WHERE is_active = 1");
		return $query->result();
	}

	function get_one_brand($id)
	{
		$query=$this->db->query("SELECT * FROM msbrand WHERE brandID = ".$this->db->escape($id));
		return $query->row();
	}
}