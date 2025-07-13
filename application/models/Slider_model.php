<?php
class Slider_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		
	}
	
	function get_image($imageID)
	{
		$query=$this->db->query("SELECT imageID,imagePath,imageTitle, content, imageIndex,visible FROM msslider WHERE imageID=".$username);
		return $query;
	}
	
	function get_slider_image()
	{
		$query=$this->db->query("SELECT *FROM msslider ORDER BY imageIndex ASC");
		return $query->result();
	}	
	
	function get_visible_image()
	{
		$query=$this->db->query("SELECT imageID,imagePath,imageTitle, content, imageIndex,visible FROM msslider WHERE visible=1 ORDER BY imageIndex ASC");
		return $query->result();
	}	
	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msslider");
		$index=$query->row()->max_index+1;
		return $index;
	}
	
	function insert_image($dataToInsert)
	{
		$imageid=$this->db->escape($this->get_new_id());
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msslider(imageID,imagePath,imageTitle,content,imageIndex,visible) VALUES (".$imageid.",".$dataToInsert['imagePath'].",".$dataToInsert['imageTitle'].",".$dataToInsert['content'].",".$index.",".$dataToInsert['visible'].")");
		return $query;
	}
	
	function update_slider($dataToEdit)
	{
		$query=$this->db->query("UPDATE msslider SET imageTitle=".$dataToEdit['imageTitle'].", content=".$dataToEdit['content'].", visible=".$dataToEdit['visible']." WHERE imageID=".$dataToEdit['imageID']);
		return $query;
	}
	
	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msslider SET imagePath=".$dataToEdit['imagePath']." WHERE imageID=".$dataToEdit['imageID']);
		return $query;
	}
		
	function delete_image($id_image)
	{
		$query=$this->db->query("DELETE FROM msslider WHERE imageID=".$id_image);
		return $query;
	}
	
	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msslider SET imageIndex=imageIndex+1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msslider SET imageIndex=imageIndex-1 WHERE imageID=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msslider SET imageIndex=imageIndex-1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msslider SET imageIndex=imageIndex+1 WHERE imageID=".$imageid);
			
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