<?php
class Faq_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_visible_faq()
	{
		$query=$this->db->query("SELECT * FROM msfaq where active = 1");
		return $query->result();
	}

}