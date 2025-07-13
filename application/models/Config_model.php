<?php
class Config_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_config()
	{
		$query=$this->db->query("SELECT * FROM msconfig");
		return $query->row();
	}
	
	function update_logo($logo)
	{
		$query=$this->db->query("UPDATE msconfig SET logo=".$logo);
		return $query;
	}

	function update_video($dataToEdit)
	{
		$query = $this->db->query("UPDATE msconfig SET video_link=".$this->db->escape($dataToEdit["video_link"]));
		return $query;
	}

	function update_bloglink($dataToEdit)
	{
		$query = $this->db->query("UPDATE msconfig SET blog_link=".$dataToEdit["blog_link"]);
		return $query;
	}

	function update_why_pict($img)
	{
		$query = $this->db->query("UPDATE msconfig SET why_pict=".$img);
		return $query;
	}

	function update_cv($file)
	{
		$query = $this->db->query("UPDATE msconfig SET cv_path=".$file);
		return $query;
	}

	function update_social($dataToEdit)
	{
		$query = $this->db->query("UPDATE msconfig SET facebook_link=".$dataToEdit["facebook_link"].", 
													   twitter_link=".$dataToEdit["twitter_link"].",
													   google_link=".$dataToEdit["google_link"].",
													   linkedin_link=".$dataToEdit["linkedin_link"]);
		return $query;
	}

	function update_olshop($dataToEdit)
	{
		$query = $this->db->query("UPDATE msconfig SET shopee=".$dataToEdit["shopee"].", 
													   tokopedia=".$dataToEdit["tokopedia"].",
													   alfamart=".$dataToEdit["alfamart"].",
													   indomaret=".$dataToEdit["indomaret"].",
													   aeon=".$dataToEdit["aeon"].",
													   astro=".$dataToEdit["astro"].",
													   kkv=".$dataToEdit["kkv"].",
													   tiktok=".$dataToEdit["tiktok"]);
		return $query;
	}
}