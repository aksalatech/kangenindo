<?php

/**
* 
*/
class Slider_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msslider WHERE imageid=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msslider WHERE imageid=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM msslider ORDER BY imageindex ASC");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msslider");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msslider",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("imageid",$req);
		$this->db->update("msslider");
	}

	public function delete($req){
		$this->db->where("imageid",$req);
		$this->db->delete("msslider");
	}

	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageindex) AS max_index FROM msslider");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msslider SET imageindex=imageindex+1 WHERE imageindex=".$index);
			$query=$this->db->query("UPDATE msslider SET imageindex=imageindex-1 WHERE imageid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msslider SET imageindex=imageindex-1 WHERE imageindex=".$index);
			$query=$this->db->query("UPDATE msslider SET imageindex=imageindex+1 WHERE imageid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}