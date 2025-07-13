<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Fakultas extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Fakultas_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Fakultas_model->get_all_type();

		$this->load->view("Fakultas_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Fakultas_model");

		$data=array();
		$this->load->view("Add_fakultas_view",$data);
	}

	public function add_type(){
		$this->load->model("Fakultas_model");

		$msg="";
		$fakultas_nm = $this->input->post("fakultas_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'fakultas_nm' => $fakultas_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);

		$this->Fakultas_model->add($data);
		redirect(site_url("Fakultas"));

	}

	public function update(){
		$this->load->model("Fakultas_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Fakultas_model->get_type_by_id($req);

		$this->load->view("Add_fakultas_view",$data);
	}

	public function update_type(){
		$this->load->model("Fakultas_model");
		$fakultas_id = $this->input->post("fakultas_id");
		$fakultas_nm = $this->input->post("fakultas_nm");
		$info = $this->input->post("info");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'fakultas_nm' => $fakultas_nm,
			'info' => $info,
			'active' => $active,
			'last_update' => date("Y-m-d H:i:s")
		);
		
		$this->Fakultas_model->update($fakultas_id,$data);
		redirect(site_url("Fakultas"));
	}

	public function delete(){
		$this->load->model("Fakultas_model");
		$typeID = $this->input->get("typeID");

		$this->Fakultas_model->delete($typeID);
		redirect(site_url("Fakultas"));
	}


}