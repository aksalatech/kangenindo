<?php
class About_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function getTotalAccounts() {
		$sd = date('Y-m-d', strtotime("-84 months"));     
		$ed = date('Y-m-d'); 

		$query = $this->db->query("SELECT COUNT(1) AS Jumlah FROM MsAlumni");
		if ($query->row() == null) {
		  return 0;
		}
		else{
		  return $query->row()->jumlah;
		}
	}
	
	function get_about()
	{
		$query=$this->db->query("SELECT * FROM msabout");
		return $query->row();
	}

	function get_about_ketum()
	{
		$query = $this->db->query("SELECT * FROM msabout_ketum");
		return $query->row();
	}

	function get_about_title()
	{
		$query = $this->db->query("SELECT * FROM mstitle_master");
		return $query->row();
	}

	function get_about_fahutan()
	{
		$query = $this->db->query("SELECT * FROM msabout_fahutan");
		return $query->row();
	}
	
	function update_about($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE msabout SET content=".$dataToEdit['content'].",quote_text=".$dataToEdit['quote_text']
								);
		return $query;
	}

	function update_about1($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE msabout SET quote_text=".$dataToEdit['quote_text'].",simple_quote=".$dataToEdit['simple_quote']
								);
		return $query;
	}

	function update_about2($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE msabout SET box1=".$dataToEdit['box1'].",box2=".$dataToEdit['box2'].",box3=".$dataToEdit['box3'].",box4=".$dataToEdit['box4']
								);
		return $query;
	}

	function update_about_quote($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE msabout_quote SET quote_text=".$dataToEdit['quote_text'].",
													   content=".$dataToEdit['content'].",
													   title1=".$dataToEdit['title1'].",
													   subtitle1=".$dataToEdit['subtitle1'].",
													   title2=".$dataToEdit['title2'].",
													   subtitle2=".$dataToEdit['subtitle2']
								);
		return $query;
	}

	function update_about_title($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE mstitle_master SET title1=".$dataToEdit['title1'].",
															title2=".$dataToEdit['title2'].",
															title3=".$dataToEdit['title3'].",
															title4=".$dataToEdit['title4'].",
															title5=".$dataToEdit['title5'].",
															title6=".$dataToEdit['title6'].",
															subtitle1=".$dataToEdit['subtitle1']
								);
		return $query;
	}

	function update_about_home($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE msabout_us SET quote_text=".$dataToEdit['quote_text'].",
														visi=".$dataToEdit['visi'].",
														misi=".$dataToEdit['misi'].",
													   	content=".$dataToEdit['content']
								);
		return $query;
	}
	
	function update_pic($path)
	{
		$query=$this->db->query("UPDATE msabout SET picture=".$path);
		return $query;		
	}

	function update_pakar_pic($path)
	{
		$query=$this->db->query("UPDATE msabout SET picture_pakar=".$path);
		return $query;		
	}

	function update_about_pict($img)
	{
		$query = $this->db->query("UPDATE msabout SET picture=".$img);
		return $query;
	}

	function update_pic_home($path)
	{
		$query=$this->db->query("UPDATE msabout_us SET picture=".$path);
		return $query;		
	}


}