<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Regis extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Regis_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Regis_model->get_all_biodata();

		$this->load->view("Regis_view",$data);
	}



}