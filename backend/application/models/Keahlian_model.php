<?php

/**
* 
*/
class Keahlian_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM keahlian WHERE keahlian_id=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM keahlian WHERE keahlian_id=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_name($req){
		$query = $this->db->query("SELECT * FROM keahlian WHERE keahlian_nm=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM keahlian");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM keahlian");
		return $query->result();
	}

	public function get_active_type(){
		$query = $this->db->query("SELECT * FROM keahlian WHERE active = 1");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("keahlian",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("keahlian_id",$req);
		$this->db->update("keahlian");
	}

	public function delete($req){
		$this->db->where("keahlian_id",$req);
		$this->db->delete("keahlian");
	}

}