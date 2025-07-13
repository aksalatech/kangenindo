<?php
class Blogcategory_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_category()
	{
		$query = $this->db->query("SELECT * FROM msblogcategory WHERE is_active = 1 ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_category_by_id($id)
	{
		$query = $this->db->query("SELECT ID_blogcategory, seq_no, blogcategory_code, blogcategory_name, is_active, created_date FROM msblogcategory WHERE ID_blogcategory = ".$id." ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_list_count_category()
	{
		$query = $this->db->query("SELECT a.blogcategory_name, COUNT(b.idblog) AS total_blog_count FROM msblogcategory as a
									LEFT JOIN msblog as b on a.id_blogcategory = b.id_blogcategory
									GROUP BY a.blogcategory_name, a.id_blogcategory");
		return $query->result();
	}
}