<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Country extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Country_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Country_model->get_all_type();

		$this->load->view("Country_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Country_model");

		$data=array();
		$this->load->view("Add_country_view",$data);
	}

	public function add_type(){
		$this->load->model("Country_model");

		$msg="";
		$count_id = $this->input->post("count_id");
		$count_name = $this->input->post("count_name");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'country_code' => $count_id,
			'country_name' => $count_name,
            'last_update' => date("Y-m-d H:i:s")
		);

		$this->Country_model->add($data);
		redirect(site_url("Country"));

	}

	public function update(){
		$this->load->model("Country_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Country_model->get_type_by_id($req);

		$this->load->view("Add_country_view",$data);
	}

	public function update_type(){
		$this->load->model("Country_model");
        $catID = $this->input->post("catID");
		$count_id = $this->input->post("count_id");
		$count_name = $this->input->post("count_name");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'country_code' => $count_id,
			'country_name' => $count_name,
            'last_update' => date("Y-m-d H:i:s")
		);
		
		$this->Country_model->update($catID,$data);
		redirect(site_url("Country"));
	}

	public function delete(){
		$this->load->model("Country_model");
		$typeID = $this->input->get("typeID");

		$this->Country_model->delete($typeID);
		redirect(site_url("Country"));
	}


}