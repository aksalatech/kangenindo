<?php

/**
* 
*/
class User_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct(); 
	}

	public function get_all_user(){
		$query = $this->db->query("SELECT * FROM user_web");
		return $query->result();
	}

	public function get_all_promobio(){
		$query = $this->db->query("SELECT * FROM promo_biodata");
		return $query->result();
	}

	public function get_all_user_by_id($userID){
		$query = $this->db->query("SELECT * FROM user_web
			WHERE userid = ".$this->db->escape($userID));
		return $query->row();
	}

	public function get_all_user_by_position($position){
		$query = $this->db->query("SELECT * FROM user_web WHERE position = ".$this->db->escape($position));
		return $query->result();
	}

	function getUserByPosition($position) {
		$query = $this->db->select()
						  ->from("user_web")
						  ->where("Position", $position)
						  ->get();
		return $query->result();
	}

	public function delete_promo($r){
		$this->db->where("biodataID",$r);
		$this->db->delete("promo_biodata");

	}

	public function delete_user($r){
		$this->db->where("userid",$r);
		$this->db->delete("user_web");

	}
	public function add($data){
		if ($this->db->insert('user_web',$data)) {
			return true;
		}
	}

	public function get_all_user_update($data){
		$query = $this->db->query("SELECT * FROM user_web WHERE userID ='".$this->input->get("d")."'");
		return $query->result();
	}

	public function get_all_user_id($data){
		$query = $this->db->query("SELECT * FROM user_web WHERE userID =".$this->db->escape($data));
		return $query->row();
	}

	public function update($data,$ID){
		$this->db->set($data);
		$this->db->where("userid",$ID);
		$this->db->update("user_web");
	}
}