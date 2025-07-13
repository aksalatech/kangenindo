<?php
class Icon_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_icon()
	{
		$query = $this->db->query("SELECT ID_icon, icon_class, icon_name FROM msicon ORDER BY icon_name ASC");
		return $query->result();
	}
}