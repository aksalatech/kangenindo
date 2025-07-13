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

	function get_one_store_by_id($id)
	{
		$query=$this->db->query("SELECT * FROM msstore WHERE id_store = ".$this->db->escape($id));
		return $query->row();
	}

}