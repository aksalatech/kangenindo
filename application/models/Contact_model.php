<?php
class Contact_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_contact()
	{
		$query=$this->db->query("SELECT * FROM mscontact WHERE id = 1");
		return $query->row();
	}

	function get_contact_komda()
	{
		$query=$this->db->query("SELECT * FROM mscontact_komda ORDER BY id_komda ASC");
		return $query->result();
	}
	
	function update_contact($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE mscontact SET email=".$dataToEdit['email'].",
														 email2=".$dataToEdit['email2'].",
														 mp1=".$dataToEdit['mp1'].",
														 whatsapp=".$dataToEdit['wa'].",
														 corporation_name=".$dataToEdit['officeHours'].",
														 location=".$dataToEdit['location']
								);
		return $query;
	}

	function update_contactmsg($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE mscontact SET contactMsg=".$dataToEdit['contactMsg']
								);
		return $query;
	}

	function update_location($dataToEdit)
	{
		$query=$this->db->query("
									UPDATE mscontact SET langitude=".$dataToEdit['langitude'].", latitude=".$dataToEdit["latitude"]
								);
		return $query;
	}

	function insert_contact_msg($dataToInsert) {
		$this->db->insert("contact_message", $dataToInsert);
		return $this->db->insert_id();
	}

	function insert_franchise_req($dataToInsert) {
		$this->db->insert("franchise_requests", $dataToInsert);
		return $this->db->insert_id();
	}

	function insert_catering_req($dataToInsert) {
		$this->db->insert("catering_requests", $dataToInsert);
		return $this->db->insert_id();
	}
}