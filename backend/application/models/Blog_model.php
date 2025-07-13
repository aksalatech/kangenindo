<?php

/**
* 
*/
class Blog_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_blog_by_id($req){
		$query = $this->db->query("SELECT * FROM msblog WHERE idblog=".$this->db->escape($req));
		return $query->result();
	}

	public function get_blogkat_by_id($req){
		$query = $this->db->query("SELECT * FROM msblogcategory WHERE id_blogcategory=".$this->db->escape($req));
		return $query->result();
	}

	public function get_all_blog(){
		$query = $this->db->query("SELECT * FROM msblog ORDER BY seq_no ASC");
		return $query->result();
	}

	public function get_all_katblog(){
		$query = $this->db->query("SELECT * FROM msblogcategory ORDER BY seq_no ASC");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msblog");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msblog",$data);
	}

	public function addKat($data){
		$this->db->insert("msblogcategory",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("idblog",$req);
		$this->db->update("msblog");
	}

	public function updateKat($req,$data){
		$this->db->set($data);
		$this->db->where("id_blogcategory",$req);
		$this->db->update("msblogcategory");
	}

	public function delete($req){
		$this->db->where("idblog",$req);
		$this->db->delete("msblog");
	}

	public function deleteKat($req){
		$this->db->where("id_blogcategory",$req);
		$this->db->delete("msblogcategory");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM msblog");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no-1 WHERE idblog=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no+1 WHERE idblog=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}