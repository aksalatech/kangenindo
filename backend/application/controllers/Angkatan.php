<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Angkatan extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Angkatan_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Angkatan_model->get_all_type();

		$this->load->view("Angkatan_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Angkatan_model");

		$data=array();
		$this->load->view("Add_angkatan_view",$data);
	}

	public function add_type(){
		$this->load->model("Angkatan_model");

		$msg="";
		$angkatan_nm = $this->input->post("angkatan_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'angkatan_nm' => $angkatan_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);

		$this->Angkatan_model->add($data);
		redirect(site_url("Angkatan"));

	}

	public function update(){
		$this->load->model("Angkatan_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Angkatan_model->get_type_by_id($req);

		$this->load->view("Add_angkatan_view",$data);
	}

	public function update_type(){
		$this->load->model("Angkatan_model");
		$angkatan_id = $this->input->post("angkatan_id");
		$angkatan_nm = $this->input->post("angkatan_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'angkatan_nm' => $angkatan_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);
		
		$this->Angkatan_model->update($angkatan_id,$data);
		redirect(site_url("Angkatan"));
	}

	public function delete(){
		$this->load->model("Angkatan_model");
		$typeID = $this->input->get("typeID");

		$this->Angkatan_model->delete($typeID);
		redirect(site_url("Angkatan"));
	}


}