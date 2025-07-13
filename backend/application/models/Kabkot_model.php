<?php

/**
* 
*/
class Kabkot_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mskabkota WHERE kabkot_id=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mskabkota WHERE kabkot_id=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_name($req){
		$query = $this->db->query("SELECT * FROM mskabkota WHERE kabkot_name=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT k.*, p.prov_name FROM mskabkota as k JOIN msprovinsi AS p ON k.prov_id = p.prov_id");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT k.*, p.prov_name FROM mskabkota as k JOIN msprovinsi AS p ON k.prov_id = p.prov_id");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("mskabkota",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("kabkot_id",$req);
		$this->db->update("mskabkota");
	}

	public function delete($req){
		$this->db->where("kabkot_id",$req);
		$this->db->delete("mskabkota");
	}

}