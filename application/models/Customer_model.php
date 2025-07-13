<?php
class Customer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_customer()
	{
		$query = $this->db->query("SELECT * FROM mscustomer WHERE is_active = 1 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_client($clientID)
	{
		$query=$this->db->query("SELECT ID_customer, seq_no, brand_name, brand_path, is_active, created_date FROM mscustomer WHERE ID_customer=".$username);
		return $query;
	}
	
	function get_full_client()
	{
		$query=$this->db->query("SELECT ID_customer, seq_no, brand_name, brand_path, is_active, created_date FROM mscustomer ORDER BY seq_no ASC");
		return $query->result();
	}	
	
	function get_visible_image()
	{
		$query=$this->db->query("SELECT ID_customer, seq_no, brand_name, brand_path, is_active, created_date FROM mscustomer WHERE is_active=1 ORDER BY seq_no ASC");
		return $query->result();
	}	
	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mscustomer");
		$index=$query->row()->max_index+1;
		return $index;
	}
	
	function insert_client($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO mscustomer(seq_no, brand_name, brand_path, is_active, created_date) VALUES (".$index.",".$dataToInsert['brand_name'].",".$dataToInsert['brand_path'].",".$dataToInsert['is_active'].", NOW())");
		return $query;
	}
	
	function update_client($dataToEdit)
	{
		$query=$this->db->query("UPDATE mscustomer SET brand_name=".$dataToEdit['brand_name'].", is_active=".$dataToEdit['is_active']." WHERE ID_customer=".$dataToEdit['ID_customer']);
		return $query;
	}
	
	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE mscustomer SET brand_path=".$dataToEdit['brand_path']." WHERE ID_customer=".$dataToEdit['ID_customer']);
		return $query;
	}
		
	function delete_client($id_client)
	{
		$query=$this->db->query("DELETE FROM mscustomer WHERE ID_customer=".$id_client);
		return $query;
	}
	
	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no-1 WHERE ID_customer=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no+1 WHERE ID_customer=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function get_count()
	{
		$query=$this->db->query("SELECT COUNT(*) AS jumlah FROM mscustomer");
		return $query->row();
	}
}