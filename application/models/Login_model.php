<?php

/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct(); 
	}

	function check($username,$password){
		$query =$this->db->select()
				->from("user_web")
				->where("username",$username)
				->where("Position",POSITION_ADVISOR)
				->get();

		if ($query->num_rows()>0) {
			$row = $query->row();
			if ($this->encryption->decrypt($row->password) == $password)
				return true;
			else
				return false;
		}
		else{
			return false;
		}
	}

	function checkNonPeserta($username,$password){
		$query =$this->db->select()
				->from("user_web")
				->where("username",$username)
				->where_in("Position",array(POSITION_ADMIN, POSITION_ASSESSOR))
				->get();

		if ($query->num_rows()>0) {
			$row = $query->row();
			if ($this->encryption->decrypt($row->password) == $password)
				return true;
			else
				return false;
		}
		else{
			return false;
		}
	}

	function getUserByUsername($username) {
		$query = $this->db->select()
						  ->from("user_web")
						  ->where("username", $username)
						  ->get();
		return $query->row();
	}

	function getUserByUsernameAdvisor($username) {
		$query = $this->db->select()
						  ->from("user_web")
						  ->where("username", $username)
						  ->where("Position", "Advisor")
						  ->get();
		return $query->row();
	}

	function getUserByID($id) {
		$query = $this->db->select()
						  ->from("user_web")
						  ->where("userid", $id)
						  ->get();
		return $query->row();
	}

	function checkIDGoogle($id){
		$query =$this->db->select()
				->from("user_web")
				->where("google_key",$id)
				->get();

		return $query->row();
	}

	function checkIDFB($id){
		$query =$this->db->select()
				->from("user_web")
				->where("fb_key",$id)
				->get();

		return $query->row();
	}

	public function add($data){
		$this->db->insert('user_web',$data);
		return $this->db->insert_id();
	}

	public function update($id, $data){
		$this->db->where("userid", $id);
		$this->db->update('user_web',$data);
	}
}