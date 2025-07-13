<?php
class Image_gallery_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_image_gallery_by_category($category)
	{
		$query=$this->db->query("SELECT * FROM msimage_gallery where category_gallery = ".$this->db->escape($category));
		return $query->result();
	}

}