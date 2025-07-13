<?php
class Store_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_store()
	{
		$query=$this->db->query("SELECT * FROM msstore");
		return $query->result();
	}

	function get_one_store_by_id($req)
	{
		$query=$this->db->query("SELECT * FROM msstore WHERE id_store = ".$this->db->escape($req));
		return $query->result();
	}

    public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_store",$req);
		$this->db->update("msstore");
	}

    public function add($data){
		$this->db->insert("msstore",$data);
	}

    public function delete($req){
		$this->db->where("id_store",$req);
		$this->db->delete("msstore");
	}

}