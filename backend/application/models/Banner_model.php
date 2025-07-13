<?php
class Banner_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_banner()
	{
		$query=$this->db->query("SELECT * FROM msbanner_home");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msbanner_home",$data);
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msbanner_home WHERE id_banner=".$this->db->escape($req));
		return $query->result();
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_banner",$req);
		$this->db->update("msbanner_home");
	}

	public function delete($req){
		$this->db->where("id_banner",$req);
		$this->db->delete("msbanner_home");
	}

}