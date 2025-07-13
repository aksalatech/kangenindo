<?php

/**
* 
*/
class Brand_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

    public function get_brand(){
		$query = $this->db->query("SELECT i.*,c.id_category,c.category_name FROM msimage as i LEFT JOIN mscategory as c on c.id_category=i.id_category ORDER BY i.imageindex ASC");
		return $query->result();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT i.*,c.id_category,c.category_name FROM msimage as i LEFT JOIN mscategory as c on c.id_category=i.id_category WHERE imageid=".$this->db->escape($req));
		return $query->result();
	}

	public function get_detail_by_id($req){
		$query = $this->db->query("SELECT * FROM msimage_detail WHERE detailid=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM msimage WHERE imageid=".$this->db->escape($req));
		return $query->row();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT i.*,c.id_category,c.category_name FROM msimage as i LEFT JOIN mscategory as c on c.id_category=i.id_category ORDER BY i.imageindex ASC");
		return $query->result();
	}

	public function get_detail_gal($id){
		$query = $this->db->query("SELECT * FROM msimage_detail WHERE imageid=".$id);
		return $query->result();
	}

	public function get_type(){
		$query = $this->db->query("SELECT * FROM msimage");
		return $query->result();
	}

	public function add($data){
		$this->db->insert("msimage",$data);
	}

	public function adddetail($data){
		$this->db->insert("msimage_detail",$data);
	}

	public function updatedetail($req,$data){
		$this->db->set($data);
		$this->db->where("detailid",$req);
		$this->db->update("msimage_detail");
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("imageid",$req);
		$this->db->update("msimage");
	}

	public function delete_detail($req){
		$this->db->where("detailid",$req);
		$this->db->delete("msimage_detail");
	}

	public function delete($req){
		$this->db->where("imageid",$req);
		$this->db->delete("msimage");
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageindex) AS max_index FROM msimage");
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
			$query=$this->db->query("UPDATE msimage SET imageindex=imageindex+1 WHERE imageindex=".$index);
			$query=$this->db->query("UPDATE msimage SET imageindex=imageindex-1 WHERE imageid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($clientid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msimage SET imageindex=imageindex-1 WHERE imageindex=".$index);
			$query=$this->db->query("UPDATE msimage SET imageindex=imageindex+1 WHERE imageid=".$clientid);
			
			return $query;
		}
		else
			return "";
	}

}