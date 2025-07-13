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

}