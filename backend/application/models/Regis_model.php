<?php
class Regis_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_biodata()
	{
		$query=$this->db->query("SELECT * FROM promo_biodata");
		return $query->result();
	}

}