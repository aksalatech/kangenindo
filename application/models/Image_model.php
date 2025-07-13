<?php
class Image_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_new_id()
	{
		$query=$this->db->query("SELECT RIGHT(imageID,7) AS ID FROM msimage ORDER BY imageID DESC LIMIT 0,1");
		$res=$query->row();
		if ($res==NULL)
			$new=1;
		else
			$new=($res->ID+1);
			
		return "IMG".str_pad($new,7,"0",STR_PAD_LEFT);
	}
	
	function get_image($imageID)
	{
		$query=$this->db->query("SELECT i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible, COUNT(1) AS jml_detail FROM msimage AS i LEFT JOIN msimage_detail as d ON i.imageID = d.imageID  
								 WHERE i.imageID=".$imageID." 
								 GROUP BY i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible
								 ORDER BY i.imageIndex ASC");
		return $query;
	}
	
	function get_full_image()
	{
		$query=$this->db->query("SELECT i.imageID, i.ID_category, i.imagePath, i.imageTitle, i.imageIndex, i.imageDesc, i.visible, COUNT(1) AS jml_detail  
								FROM msimage AS i LEFT JOIN msimage_detail as d ON i.imageID = d.imageID
								GROUP BY i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible 
								ORDER BY i.imageIndex DESC");
		return $query->result();
	}

	function get_full_image_by_brand($brand)
	{
		$query=$this->db->query("SELECT i.imageID, i.ID_category, i.imagePath, i.imageTitle, i.imageIndex, i.imageDesc, i.visible, COUNT(1) AS jml_detail  
								FROM msimage AS i 
								LEFT JOIN msimage_detail as d ON i.imageID = d.imageID
								LEFT JOIN mscategory AS c ON i.id_category = c.id_category 
								WHERE c.id_brand = ".$this->db->escape($brand)." 
								GROUP BY i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible 
								ORDER BY i.imageIndex DESC");
		return $query->result();
	}

	function get_recent_image()
	{
		$query=$this->db->query("SELECT i.imageID, i.ID_category, i.imagePath, i.imageTitle, i.imageIndex, i.imageDesc, i.visible, COUNT(1) AS jml_detail  
								FROM msimage AS i LEFT JOIN msimage_detail as d ON i.imageID = d.imageID
								GROUP BY i.imageID, i.ID_category, i.imagePath,i.imageTitle,i.imageIndex,i.imageDesc,i.visible 
								ORDER BY i.imageIndex DESC LIMIT 6");
		return $query->result();
	}	
	
	function get_visible_image()
	{
		$query=$this->db->query("SELECT i.*, COUNT(1) AS jml_detail, c.category_code, c.category_name FROM msimage AS i 
									LEFT JOIN mscategory as c ON i.id_category  = c.id_category
									WHERE i.visible=1 
									GROUP BY i.imageid, i.id_category, i.imagepath,i.imagetitle,i.imageindex,i.imagedesc,i.visible,c.category_code,c.category_name 
									ORDER BY i.imageindex ASC
									LIMIT 7");
		return $query->result();
	}

	function get_visible_image_brand($brand)
	{
		$query=$this->db->query("SELECT i.*, COUNT(1) AS jml_detail, c.category_code, c.category_name FROM msimage AS i 
									LEFT JOIN mscategory as c ON i.id_category  = c.id_category
									WHERE i.visible=1 AND c.id_brand = ".$this->db->escape($brand)." 
									GROUP BY i.imageid, i.id_category, i.imagepath,i.imagetitle,i.imageindex,i.imagedesc,i.visible,c.category_code,c.category_name 
									ORDER BY i.imageindex ASC");
		return $query->result();
	}

	function get_image_by_category($id)
	{
		$query=$this->db->query("SELECT i.*, COUNT(1) AS jml_detail, c.category_code, c.category_name FROM msimage AS i 
									LEFT JOIN mscategory as c ON i.id_category  = c.id_category
									WHERE i.visible=1 AND i.id_category = ".$this->db->escape($id)."
									GROUP BY i.imageid, i.id_category, i.imagepath,i.imagetitle,i.imageindex,i.imagedesc,i.visible,c.category_code,c.category_name 
									ORDER BY i.imageindex ASC");
		return $query->result();
	}


	function get_limit_image()
	{
		$query=$this->db->query("SELECT i.*, COUNT(1) AS jml_detail, COUNT(d.detailid) AS total, c.category_code, c.category_name FROM msimage AS i 
									LEFT JOIN mscategory as c ON i.id_category  = c.id_category
									LEFT JOIN msimage_detail as d ON i.imageid = d.imageid
									WHERE i.visible=1 
									GROUP BY i.imageid, i.id_category, i.imagepath,i.imagetitle,i.imageindex,i.imagedesc,i.visible,c.category_code,c.category_name 
									ORDER BY i.imageindex ASC");
		return $query->result();
	}


	function get_full_detail_image($imageid)
	{
		$query=$this->db->query("SELECT detailID, imageID, imagePath,imageTitle,imageIndex,imageDesc,visible FROM msimage_detail WHERE imageID=".$imageid."  ORDER BY imageIndex ASC");
		return $query->result();
	}	
	
	function get_visible_detail_image($imageid)
	{
		$query=$this->db->query("SELECT detailID, imageID, imagePath,imageTitle,imageIndex,imageDesc,visible FROM msimage_detail WHERE visible=1 AND imageID=".$imageid." ORDER BY imageIndex ASC");
		return $query->result();
	}

	function get_image_by_id($id)
	{
		$query = $this->db->query("SELECT * FROM msimage WHERE imageID = ".$id);
		return $query->row();
	}

		
	function insert_image($dataToInsert)
	{
		// $imageid=$this->db->escape($this->get_new_id());
		$index=$this->db->escape($this->get_index());
		$query=$this->db->query("INSERT INTO msimage(ID_category, imagePath,imageTitle,imageIndex,imageDesc,visible) VALUES (".$dataToInsert['ID_category'].",".$dataToInsert['imagePath'].",".$dataToInsert['imageTitle'].",".$index.",".$dataToInsert['imageDesc'].",".$dataToInsert['visible'].")");
		return $query;
	}

	function insert_detail_image($dataToInsert)
	{
		$index=$this->db->escape($this->get_all_detail_index());
		$query=$this->db->query("INSERT INTO msimage_detail(imageID, imagePath,imageTitle,imageIndex,imageDesc,visible) VALUES (".$dataToInsert["imageID"].",".$dataToInsert['imagePath'].",".$dataToInsert['imageTitle'].",".$index.",".$dataToInsert['imageDesc'].",".$dataToInsert['visible'].")");
		return $query;
	}
	
	function update_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msimage SET imagePath=".$dataToEdit['imagePath']." WHERE imageID=".$dataToEdit['imageID']);
		return $query;
	}

	function update_detail_image($dataToEdit)
	{
		$query=$this->db->query("UPDATE msimage_detail SET imagePath=".$dataToEdit['imagePath']." WHERE detailID=".$dataToEdit['detailID']);
		return $query;
	}
	
	function update_title_desc($dataToEdit)
	{
		$query=$this->db->query("UPDATE msimage SET imageTitle=".$dataToEdit['imageTitle'].", ID_category=".$dataToEdit['ID_category'].", imageDesc=".$dataToEdit['imageDesc'].",visible=".$dataToEdit['visible']." WHERE imageID=".$dataToEdit['imageID']);

		return $query;
	}
		
	function update_detail_title_desc($dataToEdit)
	{
		$query=$this->db->query("UPDATE msimage_detail SET imageTitle=".$dataToEdit['imageTitle'].", imageDesc=".$dataToEdit['imageDesc'].",visible=".$dataToEdit['visible']." WHERE detailID=".$dataToEdit['detailID']);

		return $query;
	}

	function delete_image($id_image)
	{
		$query=$this->db->query("DELETE FROM msimage WHERE imageID=".$id_image);
		return $query;
	}

	function delete_detail_image($id_detail)
	{
		$query=$this->db->query("DELETE FROM msimage_detail WHERE detailID=".$id_detail);
		return $query;
	}
	
	function get_index()
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msimage");
		$index=$query->row()->max_index+1;
		return $index;
	}
	
	function index_up($imageid,$index)
	{
		if ($index>0)
		{
			$query=$this->db->query("UPDATE msimage SET imageIndex=imageIndex+1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msimage SET imageIndex=imageIndex-1 WHERE imageID=".$imageid);

			return $query;
		}
		else
			return "";
	}
	
	function index_down($imageid,$index)
	{
		if ($index<$this->get_index())
		{
			$query=$this->db->query("UPDATE msimage SET imageIndex=imageIndex-1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msimage SET imageIndex=imageIndex+1 WHERE imageID=".$imageid);
			
			return $query;
		}
		else
			return "";
	}
	

	// Detail Image Index

	function get_all_detail_index()
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msimage_detail");
		$index=$query->row()->max_index+1;
		return $index;
	}

	function get_detail_index($id)
	{
		$query=$this->db->query("SELECT MAX(imageIndex) AS max_index FROM msimage_detail WHERE imageID=".$id);
		$index=$query->row()->max_index+1;
		return $index;
	}
	
	function get_detail_min_index($id)
	{
		$query=$this->db->query("SELECT MIN(imageIndex) AS min_index FROM msimage_detail WHERE imageID=".$id);
		$index=$query->row()->min_index-1;
		return $index;
	}

	function index_detail_up($detailID,$imageID,$index)
	{
		if ($index>$this->get_detail_min_index($imageID))
		{
			$query=$this->db->query("UPDATE msimage_detail SET imageIndex=imageIndex+1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msimage_detail SET imageIndex=imageIndex-1 WHERE detailID=".$detailID);
			return $query;
		}
		else
			return "";
	}
	
	function index_detail_down($detailID,$imageID,$index)
	{
		if ($index<$this->get_detail_index($imageID))
		{
			$query=$this->db->query("UPDATE msimage_detail SET imageIndex=imageIndex-1 WHERE imageIndex=".$index);
			$query=$this->db->query("UPDATE msimage_detail SET imageIndex=imageIndex+1 WHERE detailID=".$detailID);
			
			return $query;
		}
		else
			return "";
	}

	function get_count_detail()
	{
		$query=$this->db->query("SELECT COUNT(*) AS jumlah FROM msimage_detail");
		return $query->row()->jumlah;
	}
}