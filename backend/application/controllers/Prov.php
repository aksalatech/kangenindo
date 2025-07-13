<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Prov extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Prov_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Prov_model->get_all_type();

		$this->load->view("Prov_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Prov_model");
		$this->load->model("Country_model");
		
		$data=array();
		$data['countryList'] = $this->Country_model->get_all_type();
		$this->load->view("Add_prov_view",$data);
	}

	public function add_type(){
		$this->load->model("Prov_model");

		$msg="";
		$prov_id = $this->input->post("prov_id");
		$prov_name = $this->input->post("prov_name");
		$provinsi = $this->input->post("provinsi");
		$kd_provinsi = $this->input->post("kd_provinsi");
		$latitude = $this->input->post("latitude");
		$langitude = $this->input->post("langitude");
		$countryid = $this->input->post("countryid");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'prov_id' => $prov_id,
			'prov_name' => $prov_name,
			'provinsi' => $provinsi,
			'kd_provinsi' => $kd_provinsi,
			'latitude' => $latitude,
			'langitude' => $langitude,
			'countryid' => $countryid
		);

		$this->Prov_model->add($data);
		redirect(site_url("Prov"));

	}

	public function update(){
		$this->load->model("Prov_model");
		$this->load->model("Country_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data['countryList'] = $this->Country_model->get_all_type();
		$data["viewProduct"] = $this->Prov_model->get_type_by_id($req);

		$this->load->view("Add_prov_view",$data);
	}

	public function update_type(){
		$this->load->model("Prov_model");
		$prov_id = $this->input->post("prov_id");
		$prov_name = $this->input->post("prov_name");
		$provinsi = $this->input->post("provinsi");
		$kd_provinsi = $this->input->post("kd_provinsi");
		$latitude = $this->input->post("latitude");
		$langitude = $this->input->post("langitude");
		$countryid = $this->input->post("countryid");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'prov_id' => $prov_id,
			'prov_name' => $prov_name,
			'provinsi' => $provinsi,
			'kd_provinsi' => $kd_provinsi,
			'latitude' => $latitude,
			'langitude' => $langitude,
			'countryid' => $countryid
		);
		
		$this->Prov_model->update($prov_id,$data);
		redirect(site_url("Prov"));
	}

	public function delete(){
		$this->load->model("Prov_model");
		$typeID = $this->input->get("typeID");

		$this->Prov_model->delete($typeID);
		redirect(site_url("Prov"));
	}


}