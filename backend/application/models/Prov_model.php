<?php

/**
* 
*/
class Prov_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msprovinsi WHERE prov_id=".$this->db->escape($req));
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
		$query = $this->db->query("SELECT * FROM msprovinsi as prov left join country as cou on cou.countryid = prov.countryid");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msprovinsi");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msprovinsi",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("prov_id",$req);
		$this->db->update("msprovinsi");
	}

	public function delete($req){
		$this->db->where("prov_id",$req);
		$this->db->delete("msprovinsi");
	}

}