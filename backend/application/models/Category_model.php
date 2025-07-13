<?php

/**
* 
*/
class Category_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM mscategory WHERE id_category=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT c.*,cs.brandNm FROM mscategory as c
									LEFT JOIN msbrand as cs on c.id_brand = cs.brandID 
									WHERE cs.brandNm LIKE  '%".$req."%'
									ORDER BY c.seq_no ASC");
		return $query->result();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT c.*,cs.brandNm FROM mscategory as c
									LEFT JOIN msbrand as cs on c.id_brand = cs.brandID");
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msslider");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("mscategory",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("id_category",$req);
		$this->db->update("mscategory");
	}

	public function delete($req){
		$this->db->where("id_category",$req);
		$this->db->delete("mscategory");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM mscategory");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function index_up($clientid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no-1 WHERE id_category=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE mscategory SET seq_no=seq_no+1 WHERE id_category=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}