<?php
class Banner_promo_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_image($imageID)
	{
		$query=$this->db->query("SELECT i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible, COUNT(1) AS jml_detail FROM msimage AS i LEFT JOIN msimage_detail as d ON i.imageID = d.imageID  
								 WHERE i.imageID=".$imageID." 
								 GROUP BY i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible
								 ORDER BY i.imageIndex ASC");
		return $query;
	}
	
	function get_full_banner_promo()
	{
		$query=$this->db->query("SELECT * FROM msbanner_promo order by id_promo ASC");
		return $query->result();
	}	

}