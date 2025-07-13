<?php
class User_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		
	}
	
	function get_user($username)
	{
		$query=$this->db->query("SELECT * FROM msadmin WHERE ID_admin=".$username);	
		return $query->result();
	}
	
	function forgot_user($username,$email)
	{
		$query=$this->db->query("SELECT pass FROM msadmin WHERE ID_admin=".$username." AND email=".$email);	
		
		if ($query->row())
			return $query->row()->pass;
		else
			return '';
	}
	
	function get_full_user()
	{
		$query=$this->db->query("SELECT ID_admin, pass,admin_name,email,role,created_date,active FROM msadmin");
		return $query->result();
	}

	function get_promo_account($email)
	{
		$query=$this->db->query("SELECT * FROM promo_biodata WHERE email = ".$this->db->escape($email));
		return $query->row();
	}

	function get_subscribe_email($email)
	{
		$query=$this->db->query("SELECT * FROM subscribe_email WHERE email = ".$this->db->escape($email));
		return $query->row();
	}
	
	
	function insert_user($dataToInsert)
	{
		$query=$this->db->query("INSERT INTO msadmin(ID_admin,pass,admin_name,email,role,created_date,active) VALUES (".$dataToInsert['ID_admin'].",".$dataToInsert['pass'].",".$dataToInsert['admin_name'].",".$dataToInsert['email'].",".$dataToInsert['role'].",NOW(),".$dataToInsert['active'].")");
		return $query;
	}
	
	function update_user($dataToEdit)
	{
		$query=$this->db->query("UPDATE msadmin SET admin_name=".$dataToEdit['admin_name'].",email=".$dataToEdit['email'].",role=".$dataToEdit['role'].",active=".$dataToEdit['active']." WHERE ID_admin=".$dataToEdit['ID_admin']);
		return $query;
	}
	
	function change_pass($id_user,$pass)
	{
		$query=$this->db->query("UPDATE msadmin SET pass=".$pass." WHERE ID_admin=".$id_user);
		return $query;
	}
	
	function delete_user($id_admin)
	{
		$query=$this->db->query("DELETE FROM msadmin WHERE ID_admin=".$id_admin);
		return $query;
	}

	function insert_biodata($dataToInsert)
	{
		$this->db->insert("promo_biodata", $dataToInsert);
		return $this->db->insert_id();
	}

	function insert_subscribe($dataToInsert)
	{
		$this->db->insert("subscribe_email", $dataToInsert);
		return $this->db->insert_id();
	}
}