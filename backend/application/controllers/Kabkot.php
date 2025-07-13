<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Kabkot extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Kabkot_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Kabkot_model->get_all_type();

		$this->load->view("Kabkot_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Prov_model");

		$data=array();
		$data["provList"] = $this->Prov_model->get_all_type();
		$this->load->view("Add_kabkot_view",$data);
	}

	public function add_type(){
		$this->load->model("Kabkot_model");

		$msg="";
		$kabkot_id = $this->input->post("kabkot_id");
		$prov_id = $this->input->post("prov_id");
		$kabkot_name = $this->input->post("kabkot_name");
		$kab_kota = $this->input->post("kab_kota");
		$latitude = $this->input->post("latitude");
		$langitude = $this->input->post("langitude");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'kabkot_id' => $kabkot_id,
			'prov_id' => $prov_id,
			'kabkot_name' => $kabkot_name,
			'kab_kota' => $kab_kota,
			'latitude' => $latitude,
			'langitude' => $langitude
		);

		$this->Kabkot_model->add($data);
		redirect(site_url("Kabkot"));

	}

	public function update(){
		$this->load->model("Kabkot_model");
		$this->load->model("Prov_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["provList"] = $this->Prov_model->get_all_type();
		$data["viewProduct"] = $this->Kabkot_model->get_type_by_id($req);

		$this->load->view("Add_kabkot_view",$data);
	}

	public function update_type(){
		$this->load->model("Kabkot_model");
		$kabkot_id = $this->input->post("kabkot_id");
		$prov_id = $this->input->post("prov_id");
		$kabkot_name = $this->input->post("kabkot_name");
		$kab_kota = $this->input->post("kab_kota");
		$latitude = $this->input->post("latitude");
		$langitude = $this->input->post("langitude");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'kabkot_id' => $kabkot_id,
			'prov_id' => $prov_id,
			'kabkot_name' => $kabkot_name,
			'kab_kota' => $kab_kota,
			'latitude' => $latitude,
			'langitude' => $langitude
		);
		
		$this->Kabkot_model->update($kabkot_id,$data);
		redirect(site_url("Kabkot"));
	}

	public function delete(){
		$this->load->model("Kabkot_model");
		$typeID = $this->input->get("typeID");

		$this->Kabkot_model->delete($typeID);
		redirect(site_url("Kabkot"));
	}


}