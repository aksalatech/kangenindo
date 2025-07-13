<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Catering extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Catering_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Catering_model->get_all_cat();

		$this->load->view("Catering_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Store_model");

		$data=array();
		$this->load->view("Add_store_view",$data);
	}

	public function add_type(){
		$this->load->model("Store_model");

		$msg="";
		$store_name = $this->input->post("store_name");
		$store_address = $this->input->post("store_address");
		$store_phone = $this->input->post("store_phone");
		$open_hours = $this->input->post("open_hours");
		$open_hours2 = $this->input->post("open_hours2");
		$latitude = $this->input->post("latitude");
        $longitude = $this->input->post("longitude");
        $active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'store_name' => $store_name,
			'store_address' => $store_address,
			'store_phone' => $store_phone,
			'open_hours' => $open_hours,
			'open_hours2' => $open_hours2,
			'latitude' => $latitude,
            'longitude' => $longitude,
			'active' => $active
		);

		$this->Store_model->add($data);
		redirect(site_url("Store"));

	}

	public function update(){
		$this->load->model("Store_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Store_model->get_one_store_by_id($req);

		$this->load->view("Add_store_view",$data);
	}

	public function update_type(){
		$this->load->model("Store_model");
		$store_name = $this->input->post("store_name");
		$store_address = $this->input->post("store_address");
		$store_phone = $this->input->post("store_phone");
		$open_hours = $this->input->post("open_hours");
		$open_hours2 = $this->input->post("open_hours2");
		$latitude = $this->input->post("latitude");
        $longitude = $this->input->post("longitude");
        $active = $this->input->post("active");
        $catID = $this->input->post("catID");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'store_name' => $store_name,
			'store_address' => $store_address,
			'store_phone' => $store_phone,
			'open_hours' => $open_hours,
			'open_hours2' => $open_hours2,
			'latitude' => $latitude,
            'longitude' => $longitude,
			'active' => $active
		);
		
		$this->Store_model->update($catID,$data);
		redirect(site_url("Store"));
	}

	public function delete(){
		$this->load->model("Store_model");
		$typeID = $this->input->get("typeID");

		$this->Store_model->delete($typeID);
		redirect(site_url("Store"));
	}


}