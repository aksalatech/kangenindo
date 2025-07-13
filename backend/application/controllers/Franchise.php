<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Franchise extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Franchise_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Franchise_model->get_all_fran();

		$this->load->view("Franchise_view",$data);
	}



}