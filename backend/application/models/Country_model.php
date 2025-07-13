<?php

/**
* 
*/
class Country_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM country WHERE countryid=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msprovinsi WHERE prov_id=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_name($req){
		$query = $this->db->query("SELECT * FROM msprovinsi WHERE prov_name=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM country");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msprovinsi");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("country",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("countryid",$req);
		$this->db->update("country");
	}

	public function delete($req){
		$this->db->where("countryid",$req);
		$this->db->delete("country");
	}

}