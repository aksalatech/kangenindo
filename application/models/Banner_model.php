<?php
class Banner_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_banner_page($page)
	{
		$query=$this->db->query("SELECT * FROM msbanner WHERE page = ".$this->db->escape($page));
		return $query->row();
	}

}