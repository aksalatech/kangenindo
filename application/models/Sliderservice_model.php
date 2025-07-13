<?php
class Sliderservice_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		
	}
	
	function get_new_id()
	{
		$query=$this->db->query("SELECT RIGHT(ID_slider,7) AS ID FROM msslider_service ORDER BY ID_slider DESC LIMIT 0,1");
		$res=$query->row();
		if ($res==NULL)
			$new=1;
		else
			$new=($res->ID+1);
			
		return "IMG".str_pad($new,7,"0",STR_PAD_LEFT);
	}
	
	function get_image($imageID)
	{
		$query=$this->db->query("SELECT ID_slider,imagePath,slider_name, content, imageIndex,visible FROM msslider_service WHERE ID_slider=".$username);
		return $query;
	}
	
	function get_full_image()
	{
		$query=$this->db->query("SELECT * FROM msslider_service ORDER BY imageIndex");
		return $query->result();
	}	
	
	function get_visible_image()
	{
		$query=$this->db->query("SELECT * FROM msslider_service WHERE visible=1 ORDER BY imageIndex");
		return $query->result();
	}	
	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msslider_service");
		$index=$query->row()->max_index+1;
		return $index;
	}
	
	function insert_image($dataToInsert)
	{
		$imageid=$this->db->escape($this->get_new_id());
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msslider_service(ID_slider,imagePath,slider_name,content,link,imageIndex,visible) VALUES (".$imageid.",".$dataToInsert['imagePath'].",".$dataToInsert['imageTitle'].",".$dataToInsert['content'].",".$dataToInsert['link'].",".$index.",".$dataToInsert['visible'].")");
		return $query;
	}
	
	function update_slider($dataToEdit)
	{
		$query=$this->db->query("UPDATE msslider_service SET slider_name=".$dataToEdit['imageTitle'].", content=".$dataToEdit['content'].", visible=".$dataToEdit['visible']." WHERE ID_slider=".$dataToEdit['ID_slider']);
		return $query;
	}
	
	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msslider_service SET imagePath=".$dataToEdit['imagePath']." WHERE ID_slider=".$dataToEdit['ID_slider']);
		return $query;
	}
		
	function delete_image($id_image)
	{
		$query=$this->db->query("DELETE FROM msslider_service WHERE ID_slider=".$id_image);
		return $query;
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msslider_service SET imageIndex=imageIndex-1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msslider_service SET imageIndex=imageIndex+1 WHERE ID_slider=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msslider_service SET imageIndex=imageIndex+1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msslider_service SET imageIndex=imageIndex-1 WHERE ID_slider=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function get_count()
	{
		$query=$this->db->query("SELECT COUNT(*) AS jumlah FROM msslider");
		return $query->row()->jumlah;
	}
}