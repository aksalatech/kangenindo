<?php

/**
* 
*/
class Team_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msteam WHERE id_team=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msteam WHERE id_team=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM msteam");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msteam");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msteam",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_team",$req);
		$this->db->update("msteam");
	}

	public function delete($req){
		$this->db->where("id_team",$req);
		$this->db->delete("msteam");
	}

}