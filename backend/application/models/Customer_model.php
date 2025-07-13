<?php
class Customer_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msbrand WHERE brandID=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msbrand WHERE brandID=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT * FROM msbrand");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msbrand");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msbrand",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("brandID",$req);
		$this->db->update("msbrand");
	}

	public function delete($req){
		$this->db->where("brandID",$req);
		$this->db->delete("msbrand");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mscustomer");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no-1 WHERE id_customer=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscustomer SET seq_no=seq_no+1 WHERE id_customer=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
}