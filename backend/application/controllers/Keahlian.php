<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Keahlian extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Keahlian_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Keahlian_model->get_all_type();

		$this->load->view("Keahlian_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Keahlian_model");

		$data=array();
		$this->load->view("Add_keahlian_view",$data);
	}

	public function add_type(){
		$this->load->model("Keahlian_model");

		$msg="";
		$keahlian_nm = $this->input->post("keahlian_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'keahlian_nm' => $keahlian_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);

		$this->Keahlian_model->add($data);
		redirect(site_url("Keahlian"));

	}

	public function update(){
		$this->load->model("Keahlian_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Keahlian_model->get_type_by_id($req);

		$this->load->view("Add_keahlian_view",$data);
	}

	public function update_type(){
		$this->load->model("Keahlian_model");
		$keahlian_id = $this->input->post("keahlian_id");
		$keahlian_nm = $this->input->post("keahlian_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'keahlian_nm' => $keahlian_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);
		
		$this->Keahlian_model->update($keahlian_id,$data);
		redirect(site_url("Keahlian"));
	}

	public function delete(){
		$this->load->model("Keahlian_model");
		$typeID = $this->input->get("typeID");

		$this->Keahlian_model->delete($typeID);
		redirect(site_url("Keahlian"));
	}


}