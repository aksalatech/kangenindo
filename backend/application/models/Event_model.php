<?php

/**
* 
*/
class Event_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

    public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msevents WHERE id_events=".$this->db->escape($req));
		return $query->result();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM msevents ORDER BY events_index ASC");
		return $query->result();
	}

    public function add($data){
		$this->db->insert("msevents",$data);
	}


    public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_events",$req);
		$this->db->update("msevents");
	}

	public function delete($req){
		$this->db->where("id_events",$req);
		$this->db->delete("msevents");
	}
	

	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(events_index) AS max_index FROM msevents");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msevents SET events_index=events_index+1 WHERE events_index=".$index);
			$query=$this->db->query("UPDATE msevents SET events_index=events_index-1 WHERE id_events=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msevents SET events_index=events_index-1 WHERE events_index=".$index);
			$query=$this->db->query("UPDATE msevents SET events_index=events_index+1 WHERE id_events=".$clientid);
			
			return $query;
		}
		else
			return "";
	}


}