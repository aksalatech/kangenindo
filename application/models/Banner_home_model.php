<?php
class Banner_home_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_banner_home()
	{
		$query=$this->db->query("SELECT * FROM msbanner_home WHERE active = 1");
		return $query->result();
	}

	function get_banner_home_store($id_store)
	{
		$query=$this->db->query("SELECT * FROM msbanner_home WHERE id_store = ".$this->db->escape($id_store)." AND active = 1");
		return $query->result();
	}

}