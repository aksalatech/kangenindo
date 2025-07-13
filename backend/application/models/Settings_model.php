<?php

/**
* 
*/
class Settings_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_list_config()
	{
		$query=$this->db->query("SELECT * FROM msconfig");
		return $query->row();
	}

	public function get_list_about()
	{
		$query=$this->db->query("SELECT * FROM msabout");
		return $query->row();
	}

	public function get_list_about_ketum()
	{
		$query=$this->db->query("SELECT * FROM msabout_ketum");
		return $query->row();
	}

	public function get_list_about_fahutan()
	{
		$query=$this->db->query("SELECT * FROM msabout_fahutan");
		return $query->row();
	}

	public function get_list_contact()
	{
		$query=$this->db->query("SELECT * FROM mscontact");
		return $query->row();
	}

	public function get_list_contact_komda()
	{
		$query=$this->db->query("SELECT * FROM mscontact_komda");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("mscontact_komda",$data);
	}

	public function get_kontak_by_id($req){
		$query = $this->db->query("SELECT * FROM mscontact_komda WHERE id_komda=".$this->db->escape($req));
		return $query->result();
	}

	public function updateKat($req,$data){
		$this->db->set($data);
		$this->db->where("id_komda",$req);
		$this->db->update("mscontact_komda");
	}

	public function deleteKat($req){
		$this->db->where("id_komda",$req);
		$this->db->delete("mscontact_komda");
	}

	public function update_config($data){
		$this->db->set($data);
		$this->db->update("msconfig");
	}

	public function update_configbanner($req,$data){
		$this->db->set($data);
		$this->db->where("page",$req);
		$this->db->update("msbanner");
	}

	// public function update_about($data){
	// 	$this->db->set($data);
	// 	$this->db->update("msabout_hae");
	// }

	public function update_about_ketum($data){
		$this->db->set($data);
		$this->db->update("msabout_ketum");
	}

	public function update_about_fahutan($data){
		$this->db->set($data);
		$this->db->update("msabout_fahutan");
	}

	public function update_contact($data){
		$this->db->set($data);
		$this->db->update("mscontact");
	}

	public function update_contact_komda($data){
		$this->db->set($data);
		$this->db->update("mscontact_komda");
	}

}