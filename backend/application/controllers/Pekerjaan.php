<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Pekerjaan extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Pekerjaan_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Pekerjaan_model->get_all_type();

		$this->load->view("Pekerjaan_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Pekerjaan_model");

		$data=array();
		$this->load->view("Add_pekerjaan_view",$data);
	}

	public function add_type(){
		$this->load->model("Pekerjaan_model");

		$msg="";
		$pekerjaan_nm = $this->input->post("pekerjaan_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'pekerjaan_nm' => $pekerjaan_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);

		$this->Pekerjaan_model->add($data);
		redirect(site_url("Pekerjaan"));

	}

	public function update(){
		$this->load->model("Pekerjaan_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Pekerjaan_model->get_type_by_id($req);

		$this->load->view("Add_pekerjaan_view",$data);
	}

	public function update_type(){
		$this->load->model("Pekerjaan_model");
		$pekerjaan_id = $this->input->post("pekerjaan_id");
		$pekerjaan_nm = $this->input->post("pekerjaan_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'pekerjaan_nm' => $pekerjaan_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);
		
		$this->Pekerjaan_model->update($pekerjaan_id,$data);
		redirect(site_url("Pekerjaan"));
	}

	public function delete(){
		$this->load->model("Pekerjaan_model");
		$typeID = $this->input->get("typeID");

		$this->Pekerjaan_model->delete($typeID);
		redirect(site_url("Pekerjaan"));
	}


}