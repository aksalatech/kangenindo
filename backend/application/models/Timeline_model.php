<?php

/**
* 
*/
class Timeline_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mstimeline_fahutan WHERE id_timeline=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mstimeline_fahutan WHERE id_timeline=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM mstimeline_fahutan ORDER BY seq_no ASC");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM mstimeline_fahutan");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("mstimeline_fahutan",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_timeline",$req);
		$this->db->update("mstimeline_fahutan");
	}

	public function delete($req){
		$this->db->where("id_timeline",$req);
		$this->db->delete("mstimeline_fahutan");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mstimeline_fahutan");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mstimeline_fahutan SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mstimeline_fahutan SET seq_no=seq_no-1 WHERE id_timeline=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mstimeline_fahutan SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mstimeline_fahutan SET seq_no=seq_no+1 WHERE id_timeline=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}