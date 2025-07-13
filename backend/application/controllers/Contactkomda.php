<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Contactkomda extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

	}

	public function index(){
		$this->load->model("Settings_model");
		
		$data = array();

		$data['blogList'] = $this->Settings_model->get_list_contact_komda();

		$this->load->view("Contactkomda_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Settings_model");

		$data=array();

		$this->load->view("Add_contactkomda_view",$data);
	}

	public function add_type(){
		$this->load->model("Settings_model");

		$msg="";

		$title = $this->input->post("title");
		$address = $this->input->post("address");
		$latitude = $this->input->post("latitude");
        $langitude = $this->input->post("langitude");
		$dates = date("Y-m-d h:i:s");

		$data = array(
			'title' => $this->security->xss_clean($title),
			'address' => $this->security->xss_clean($address),
			'latitude' => $latitude,
            'langitude' => $langitude
		);

		$this->Settings_model->add($data);
		redirect(site_url("Contactkomda"));

	}

	public function update(){
		$this->load->model("Settings_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Settings_model->get_kontak_by_id($req);

		$this->load->view("Add_contactkomda_view",$data);
	}

	public function update_type(){
		$this->load->model("Settings_model");

		$blogID = $this->input->post("sliderID");
		$title = $this->input->post("title");
		$address = $this->input->post("address");
		$latitude = $this->input->post("latitude");
        $langitude = $this->input->post("langitude");

		$dates = date("Y-m-d h:i:s");

		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'title' => $this->security->xss_clean($title),
			'address' => $this->security->xss_clean($address),
			'latitude' => $latitude,
            'langitude' => $langitude
		);
		$this->Settings_model->updateKat($blogID,$data);
		redirect(site_url("Contactkomda"));
	}

	public function delete(){
		$this->load->model("Settings_model");
		$typeID = $this->input->get("typeID");

		$this->Settings_model->deleteKat($typeID);
		redirect(site_url("Contactkomda"));
	}


}