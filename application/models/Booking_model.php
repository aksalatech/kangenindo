<?php
class Booking_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_booking()
	{
		$query = $this->db->query("SELECT ID_booking, book_date, places, b.categoryID, c.category_name, contact_name, contact_phone, contact_email, notes, b.created_date, status FROM trbooking AS b INNER JOIN mscategory AS c ON b.categoryID = c.ID_category  ORDER BY created_date DESC");
		return $query->result();
	}

	function get_booking_by_id($id)
	{
		$query = $this->db->query("SELECT ID_booking, book_date, places, categoryID, contact_name, contact_phone, contact_email, notes, created_date, status FROM trbooking WHERE ID_booking=".$id." ORDER BY created_date DESC");
		return $query->row();
	}

	function insert_booking($dataToInsert)
	{
		$query = $this->db->query("INSERT INTO trbooking(book_date, places, categoryID, contact_name, contact_phone, contact_email, notes, created_date) VALUES (".$dataToInsert['book_date'].",".$dataToInsert['places'].",".$dataToInsert['categoryID'].",".$dataToInsert['contact_name'].",".$dataToInsert['contact_phone'].",".$dataToInsert['contact_email'].",".$dataToInsert['notes'].",NOW())");
		return $query;
	}

	function update_status($status, $ID_booking)
	{
		$query = $this->db->query("UPDATE trbooking SET status=".$status." WHERE ID_booking=".$ID_booking);
		return $query;
	}
}