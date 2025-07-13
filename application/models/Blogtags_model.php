<?php
class Blogtags_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_tags()
	{
		$query = $this->db->query("SELECT ID_tags, seq_no, tags_code, tags_name, is_active, created_date FROM msblogtags WHERE is_active = 1 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_tags_by_id($id)
	{
		$query = $this->db->query("SELECT ID_tags, seq_no, tags_code, tags_name, is_active, created_date FROM msblogtags WHERE ID_tags = ".$id." ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_full_category()
	{
		$query = $this->db->query("SELECT ID_tags, seq_no, tags_code, tags_name, is_active, created_date FROM msblogtags ORDER BY seq_no ASC");
		return $query->result();
	}

	function insert_category($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query = $this->db->query("INSERT INTO msblogtags(seq_no, tags_code, tags_name, is_active, created_date) VALUES (".$index.",".$dataToInsert['tags_code'].",".$dataToInsert['tags_name'].",".$dataToInsert['is_active'].",NOW())");
		return $query;
	}

	function update_category($dataToEdit)
	{
		$query = $this->db->query("UPDATE msblogtags SET tags_code=".$dataToEdit['tags_code'].",tags_name=".$dataToEdit['tags_name'].",is_active=".$dataToEdit['is_active']." WHERE ID_tags=".$dataToEdit['ID_tags']);
		return $query;
	}

	function delete_category($id)
	{
		$query = $this->db->query("DELETE FROM msblogtags WHERE ID_tags=".$id);
		return $query;
	}

	function index_up($tagsid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msblogtags SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblogtags SET seq_no=seq_no-1 WHERE ID_tags=".$tagsid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($tagsid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msblogtags SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblogtags SET seq_no=seq_no+1 WHERE ID_tags=".$tagsid);
			
			return $query;
		}
		else
			return "";
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM msblogtags");
		$index=$query->row()->max_index+1;
		return $index;
	}
}