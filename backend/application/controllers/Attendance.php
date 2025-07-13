<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Attendance extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		// if ($this->session->userdata("position") != POSITION_SUPERADMIN) {
		// 	show_404();
		// }
	}

	public function index(){
		$this->load->model("Cert_type_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}

		if ($this->input->post("action2")==null) {
			$req2 = "";	
		}
		else{
			$req2 = $this->input->post("action2");
		}
		$data = array();
		$data["temp"] = $req;
		$data["temp2"] = $req2;
		$data['view_branch'] = $this->Cert_type_model->get_angkatan();
		$data['view_branch2'] = $this->Cert_type_model->get_tktpddk();
		// $data['view_type'] = $this->Cert_type_model->get_all_type();
		$data['view_type'] = $this->Cert_type_model->get_all_attendance($req,$req2);

		$this->load->view("Attendance_view",$data);
	}


}