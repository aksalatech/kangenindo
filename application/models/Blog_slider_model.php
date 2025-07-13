<?php
class Blog_slider_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

		function get_full_blog_slider($ID_blog)
	{
		$query = $this->db->query("SELECT * FROM msblog_slider WHERE ID_blog = ".$ID_blog." ORDER BY imageIndex ASC");
		return $query->result();
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msblog_slider");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function delete_blog($id_slider)
	{
		$query=$this->db->query("DELETE FROM msblog_slider WHERE ID_slider=".$id_slider);
		return $query;
	}

	function insert_blog($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msblog_slider(imagePath, imageIndex, ID_blog) VALUES (".$dataToInsert['image'].",".$index.",".$dataToInsert['ID_blog'].")");
		return $query;
	}

	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msblog_slider SET imagePath=".$dataToEdit['imagePath']." WHERE ID_slider=".$dataToEdit['ID_slider']);
		return $query;
	}


	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msblog_slider SET imageIndex=imageIndex+1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msblog_slider SET imageIndex=imageIndex-1 WHERE ID_slider=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msblog_slider SET imageIndex=imageIndex-1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msblog_slider SET imageIndex=imageIndex+1 WHERE ID_slider=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
}