<?php
class Image_about_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_image_about()
	{
		$query=$this->db->query("SELECT * FROM msimage_about");
		return $query->result();
	}

}