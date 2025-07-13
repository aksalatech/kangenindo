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
				->where("password",sha1($password))
				->get();

		if ($query->num_rows()>0) {
			return true;
		}
		else{
			return false;
		}
	}

	function getUserByUsername($username) {
		$query = $this->db->query("SELECT * FROM user_web
								   WHERE username = ".$this->db->escape($username));
		return $query->row();
	}
}