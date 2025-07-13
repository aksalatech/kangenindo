<?php
class Team_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_team()
	{
		$query = $this->db->query("SELECT ID_team, seq_no, name, position_name, photo_path, facebook_link, twitter_link, linkedin_link, created_date FROM msteam ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_hae_team()
	{
		$query = $this->db->query("SELECT * FROM msteam WHERE category = 1 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_ketum_team()
	{
		$query = $this->db->query("SELECT * FROM msteam WHERE category = 2 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_fahutan_team()
	{
		$query = $this->db->query("SELECT * FROM msteam WHERE category = 3 ORDER BY seq_no ASC");
		return $query->result();
	}

	function insert_team($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msteam(seq_no, name, position_name, photo_path, facebook_link, twitter_link, linkedin_link, created_date) VALUES (".$index.",".$dataToInsert['name'].",".$dataToInsert['position_name'].",".$dataToInsert['photo_path'].",".$dataToInsert['facebook_link'].",".$dataToInsert['twitter_link'].",".$dataToInsert['linkedin_link'].",NOW())");
		return $query;
	}

	function update_team($dataToEdit)
	{
		$query=$this->db->query("UPDATE msteam SET name=".$dataToEdit['name'].", position_name=".$dataToEdit['position_name'].", facebook_link=".$dataToEdit['facebook_link'].", 
								twitter_link=".$dataToEdit['twitter_link'].", linkedin_link=".$dataToEdit['linkedin_link']." WHERE ID_team=".$dataToEdit['ID_team']);
		return $query;
	}
	
	function update_photo($dataToEdit)
	{
		$query=$this->db->query("UPDATE msteam SET photo_path=".$dataToEdit['photo_path']." WHERE ID_team=".$dataToEdit['ID_team']);
		return $query;
	}

	function delete_team($id_team)
	{
		$query=$this->db->query("DELETE FROM msteam WHERE ID_team=".$id_team);
		return $query;
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM msteam");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msteam SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msteam SET seq_no=seq_no-1 WHERE ID_team=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msteam SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msteam SET seq_no=seq_no+1 WHERE ID_team=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
}