<?php

/**
* 
*/
class Fakultas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM fakultas WHERE fakultas_id=".$this->db->escape($req));
		return $query->result();
	}

	public function get_map_by_id($req){
		$query = $this->db->query("SELECT * FROM fakultas_mapping WHERE mapping_id=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM fakultas WHERE fakultas_id=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_name($req){
		$query = $this->db->query("SELECT * FROM fakultas WHERE fakultas_nm=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM fakultas");
		return $query->result();
	}

	public function get_all_active(){
		$query = $this->db->query("SELECT * FROM fakultas WHERE active = 1");
		return $query->result();
	}

	public function get_all_type_map(){
		$query = $this->db->query("SELECT * from fakultas_mapping as f left join fakultas as fa on fa.fakultas_id = f.fakultas_id left join tkt_pddk as tk on tk.tkt_pddk_id = f.tkt_pddk_id");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM fakultas");
		return $query->result();
	}

	public function get_active_type(){
		$query = $this->db->query("SELECT f.*, m.tkt_pddk_id, tk.tkt_pddk_nm FROM fakultas as f JOIN fakultas_mapping AS m ON f.fakultas_id = m.fakultas_id left join tkt_pddk as tk on tk.tkt_pddk_id = m.tkt_pddk_id WHERE f.active = 1");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("fakultas",$data);
	}

	public function add_map($data){
		$this->db->insert("fakultas_mapping",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("fakultas_id",$req);
		$this->db->update("fakultas");
	}

	public function update_map($req,$data){
		$this->db->set($data);
		$this->db->where("mapping_id",$req);
		$this->db->update("fakultas_mapping");
	}

	public function delete($req){
		$this->db->where("fakultas_id",$req);
		$this->db->delete("fakultas");
	}

	public function delete_map($req){
		$this->db->where("mapping_id",$req);
		$this->db->delete("fakultas_mapping");
	}

}