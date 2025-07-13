<?php
class How_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_how()
	{
		$query = $this->db->query("SELECT ID_hows, seq_no, how_pict, how_title, how_subtitle, how_text, created_date FROM mshows ORDER BY seq_no ASC");
		return $query->result();
	}

	function delete_how($id)
	{
		$query = $this->db->query("DELETE FROM mshows WHERE ID_hows=".$id);
		return $query;
	}

	function insert_how($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query = $this->db->query("INSERT INTO mshows(how_pict, seq_no, how_title, how_subtitle, how_text, created_date) VALUES (".$dataToInsert['how_pict'].",".$index.",".$dataToInsert['how_title'].",".$dataToInsert['how_subtitle'].",".$dataToInsert['how_text'].",NOW())");
		return $query;
	}
	
	function update_how($dataToEdit)
	{
		$query = $this->db->query("UPDATE mshows SET how_title=".$dataToEdit['how_title'].",how_pict=".$dataToEdit['how_pict'].",how_text=".$dataToEdit['how_text'].",how_subtitle=".$dataToEdit['how_subtitle']." WHERE ID_hows=".$dataToEdit['ID_hows']);
		return $query;
	}

	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE mshows SET how_pict=".$dataToEdit['how_pict']." WHERE ID_hows=".$dataToEdit['ID_hows']);
		return $query;
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mshows");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($howid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mshows SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mshows SET seq_no=seq_no-1 WHERE ID_hows=".$howid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($howid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mshows SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mshows SET seq_no=seq_no+1 WHERE ID_hows=".$howid);
			
			return $query;
		}
		else
			return "";
	}
}