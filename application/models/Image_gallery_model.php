<?php
class Image_gallery_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_image_gallery()
	{
		$query=$this->db->query("SELECT * FROM msimage_gallery");
		return $query->result();
	}

}