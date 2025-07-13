<?php
class Blog_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_product_by_category($cate)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blogcategory = ".$cate." ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_blog($key,$limit,$start)
	{
		$key = $this->db->escape_str($key);

		$sql = "SELECT b.*, c.blogcategory_name FROM msblog as b LEFT JOIN msblogcategory as c on b.id_blogcategory = c.id_blogcategory WHERE b.title LIKE ? ORDER BY b.seq_no DESC LIMIT ? OFFSET ?";
		
		$query = $this->db->query($sql, ["%$key%", $limit, $start]);
		return $query->result();
	}

	function get_recentblog()
	{
		$query = $this->db->query("SELECT b.*, c.blogcategory_name FROM msblog as b 
									LEFT JOIN msblogcategory as c on b.id_blogcategory = c.id_blogcategory
									WHERE b.visible = 1 
									ORDER BY b.created_date DESC LIMIT 6");
		return $query->result();
	}

	function get_limit_blog($x)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE visible = 1 ORDER BY seq_no ASC LIMIT ".$x);
		return $query->result();
	}

	function get_blog_by_id($id)
	{
		$query = $this->db->query("SELECT b.*, c.blogcategory_name FROM msblog as b 
									LEFT JOIN msblogcategory as c on b.id_blogcategory = c.id_blogcategory
									WHERE idblog = ".$id);
		return $query->row();
	}

	function get_blog_by_category($id)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blogcategory = ".$id);
		return $query->row();
	}

	function get_blog_category($id)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blogcategory = ".$id);
		return $query->result();
	}

	function get_blog_tags($id)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blogcategory = ".$id);
		return $query->result();
	}

	function get_next_id($id)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blog < ".$id." ORDER BY ID_blog DESC LIMIT 1");
		return $query->num_rows() > 0 ? $query->row()->ID_blog : "";
	}

	function get_prev_id($id)
	{
		$query = $this->db->query("SELECT * FROM msblog WHERE ID_blog > ".$id." ORDER BY ID_blog ASC LIMIT 1");
		return $query->num_rows() > 0 ? $query->row()->ID_blog : "";
	}

	function get_full_blog()
	{
		$query = $this->db->query("SELECT i.*, d.blogcategory_name FROM msblog  AS i 
								   LEFT JOIN msblogcategory as d ON i.ID_blogcategory = d.ID_blogcategory
								   ORDER BY seq_no ASC");
		return $query->result();
	}

	function get_by_key($key,$limit, $start)
	{
		$query = $this->db->query("SELECT i.ID_blog, i.ID_blogcategory, i.title, i.image, i.banner, i.link, i.blog_text, i.creator, i.visible, i.created_date, d.blogcategory_name FROM msblog  AS i 
								   LEFT JOIN msblogcategory as d ON i.ID_blogcategory = d.ID_blogcategory
								   WHERE i.title LIKE '%".$key."%'
								   ORDER BY created_date DESC LIMIT ".$start.",".$limit);
								   
		return $query->result();
	}

	function get_index()
	{
		$query=$this->db->query("SELECT MAX(seq_no) AS max_index FROM msblog");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function delete_blog($id_blog)
	{
		$query=$this->db->query("DELETE FROM msblog WHERE ID_blog=".$id_blog);
		return $query;
	}

	function insert_blog($dataToInsert)
	{
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msblog(title,subtitle,image,link, ID_blogcategory, blog_text,creator,shopee,tokopedia,lazada,visible,seq_no, created_date) VALUES (".$dataToInsert['title'].",".$dataToInsert['subtitle'].",".$dataToInsert['image'].",".$dataToInsert['link'].",".$dataToInsert['category'].",".$dataToInsert['blog_text'].",".$dataToInsert['creator'].",".$dataToInsert['shopee'].",".$dataToInsert['tokopedia'].",".$dataToInsert['lazada'].",".$dataToInsert['visible'].",".$index.",NOW())");
		return $query;
	}
	
	function update_blog($dataToEdit)
	{
		$query=$this->db->query("UPDATE msblog SET title=".$dataToEdit['title'].", subtitle=".$dataToEdit['subtitle'].", link=".$dataToEdit['link'].", ID_blogcategory=".$dataToEdit['category'].", creator=".$dataToEdit['creator'].", shopee=".$dataToEdit['shopee'].", tokopedia=".$dataToEdit['tokopedia'].", lazada=".$dataToEdit['lazada'].", visible=".$dataToEdit['visible'].", blog_text=".$dataToEdit['blog_text']." WHERE ID_blog=".$dataToEdit['ID_blog']);
		// echo "UPDATE msblog SET title=".$dataToEdit['title'].", link=".$dataToEdit['link'].", creator=".$dataToEdit['creator'].", visible=".$dataToEdit['visible'].", blog_text=".$dataToEdit['blog_text']." WHERE ID_blog=".$dataToEdit['ID_blog'];
		return $query;
	}

	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msblog SET image=".$dataToEdit['image']." WHERE ID_blog=".$dataToEdit['ID_blog']);
		return $query;
	}

	function update_blog_banner($dataToEdit)
	{
		$query=$this->db->query("UPDATE msblog SET banner=".$dataToEdit['banner']." WHERE ID_blog=".$dataToEdit['ID_blog']);
		return $query;
	}

	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no+1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no-1 WHERE ID_blog=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no-1 WHERE seq_no=".$index);
			$query=$this->db->query("UPDATE msblog SET seq_no=seq_no+1 WHERE ID_blog=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
}