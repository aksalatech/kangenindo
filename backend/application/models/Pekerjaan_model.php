<?php

/**
* 
*/
class Pekerjaan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan_id=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan_id=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_name($req){
		$query = $this->db->query("SELECT * FROM pekerjaan WHERE pekerjaan_nm=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM pekerjaan");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM pekerjaan");
		return $query->result();
	}

	public function get_active_type(){
		$query = $this->db->query("SELECT * FROM pekerjaan WHERE active = 1");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("pekerjaan",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("pekerjaan_id",$req);
		$this->db->update("pekerjaan");
	}

	public function delete($req){
		$this->db->where("pekerjaan_id",$req);
		$this->db->delete("pekerjaan");
	}

}