<?php
class Promo_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_promo()
	{
		$query=$this->db->query("SELECT * FROM mspromo WHERE id_promo = 1");
		return $query->row();
	}

}