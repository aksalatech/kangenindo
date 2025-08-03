<?php
class Location_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_store()
	{
		$query=$this->db->query("SELECT * FROM msstore");
		return $query->result();
	}

	function get_active_store()
	{
		$query=$this->db->query("SELECT * FROM msstore WHERE active = 1");
		return $query->result();
	}

	function get_all_regions()
	{
		$query=$this->db->query("SELECT distinct store_region FROM msstore");
		return $query->result();
	}

	function get_all_store_by_region($region)
	{
		$query=$this->db->query("SELECT * FROM msstore WHERE active = 1 AND store_region = ".$this->db->escape($region));
		return $query->result();
	}

	function get_one_store_by_id($id)
	{
		$query=$this->db->query("SELECT * FROM msstore WHERE id_store = ".$this->db->escape($id));
		return $query->row();
	}

}