<?php

/**
* 
*/
class Testimony_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mstestimoni WHERE id_testimoni =".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msimage WHERE imageid=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM mstestimoni ORDER BY seq_no ASC");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msimage");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("mstestimoni",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_testimoni",$req);
		$this->db->update("mstestimoni");
	}

	public function delete($req){
		$this->db->where("id_testimoni",$req);
		$this->db->delete("mstestimoni");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mstestimoni");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function get_index_detail()
	{
		$query=$this->db->query("SELECT MAX(imageindex) AS max_index FROM msimage_detail");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mstestimoni SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mstestimoni SET seq_no=seq_no-1 WHERE id_testimoni=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mstestimoni SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mstestimoni SET seq_no=seq_no+1 WHERE id_testimoni=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}