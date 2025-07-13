<?php
class Category_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_category()
	{
		$query = $this->db->query("SELECT * FROM mscategory WHERE is_active = 1 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_category_by_brand($brand)
	{
		$query = $this->db->query("SELECT * FROM mscategory WHERE is_active = 1 AND id_brand = ".$this->db->escape($brand)." ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_category_by_id($id)
	{
		$query = $this->db->query("SELECT ID_category, seq_no, category_code, category_name, is_active, created_date FROM mscategory WHERE ID_category = ".$id." ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_full_category()
	{
		$query = $this->db->query("SELECT ID_category, seq_no, category_code, category_name, is_active, created_date FROM mscategory ORDER BY seq_no ASC");
		return $query->result();
	}

	function insert_category($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query = $this->db->query("INSERT INTO mscategory(seq_no, category_code, category_name, is_active, created_date) VALUES (".$index.",".$dataToInsert['category_code'].",".$dataToInsert['category_name'].",".$dataToInsert['is_active'].",NOW())");
		return $query;
	}

	function update_category($dataToEdit)
	{
		$query = $this->db->query("UPDATE mscategory SET category_code=".$dataToEdit['category_code'].",category_name=".$dataToEdit['category_name'].",is_active=".$dataToEdit['is_active']." WHERE ID_category=".$dataToEdit['ID_category']);
		return $query;
	}

	function delete_category($id)
	{
		$query = $this->db->query("DELETE FROM mscategory WHERE ID_category=".$id);
		return $query;
	}

	function index_up($categoryid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no-1 WHERE ID_category=".$categoryid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($categoryid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no+1 WHERE ID_category=".$categoryid);
			
			return $query;
		}
		else
			return "";
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mscategory");
		$index=$query->row()->max_index+1;
		return $index;
	}
}