<?php

/**
* 
*/
class Video_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msvideo WHERE videoid=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msbooks WHERE id_books=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM msvideo ORDER BY videoindex ASC");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msbooks");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msvideo",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("videoid",$req);
		$this->db->update("msvideo");
	}

	public function delete($req){
		$this->db->where("videoid",$req);
		$this->db->delete("msvideo");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(videoindex) AS max_index FROM msvideo");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msvideo SET videoindex=videoindex+1 WHERE videoindex=".$index);
			$query=$this->db->query("UPDATE msvideo SET videoindex=videoindex-1 WHERE videoid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msvideo SET videoindex=videoindex-1 WHERE videoindex=".$index);
			$query=$this->db->query("UPDATE msvideo SET videoindex=videoindex+1 WHERE videoid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}