<?php
class Frequent_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_faq()
	{
		$query=$this->db->query("SELECT * FROM msfaq");
		return $query->result();
	}

	function get_one_faq_by_id($req)
	{
		$query=$this->db->query("SELECT * FROM msfaq WHERE id_faq = ".$this->db->escape($req));
		return $query->result();
	}

    public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_faq",$req);
		$this->db->update("msfaq");
	}

    public function add($data){
		$this->db->insert("msfaq",$data);
	}

    public function delete($req){
		$this->db->where("id_faq",$req);
		$this->db->delete("msfaq");
	}

}