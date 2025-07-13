<?php
class Testimoni_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_testimoni()
	{
		$query=$this->db->query("SELECT * FROM mstestimoni");
		return $query->result();
	}

	function get_testimoni2()
	{
		$query=$this->db->query("SELECT * FROM mstestimony");
		return $query->result();
	}

}