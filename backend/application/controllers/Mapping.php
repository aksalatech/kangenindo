<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Mapping extends Custom_CI_Controller
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
		$data['view_type'] = $this->Fakultas_model->get_all_type_map();

		$this->load->view("Mapping_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Fakultas_model");
        $this->load->model("Tktpddk_model");
        $this->load->model("Fakultas_model");

		$data=array();
        $data["tktpddkList"] = $this->Tktpddk_model->get_active_type();
        $data["fakultasList"] = $this->Fakultas_model->get_all_active();
		$this->load->view("Add_mapping_view",$data);
	}

	public function add_type(){
		$this->load->model("Fakultas_model");

		$msg="";
		$tkt_pddk = $this->input->post("tkt_pddk");
        $program_studi = $this->input->post("program_studi");
		
		// $userID = $this->session->userdata("userID");

		$data = array(
			'tkt_pddk_id' => $tkt_pddk,
			'fakultas_id' => $program_studi
			
		);

		$this->Fakultas_model->add_map($data);
		redirect(site_url("Mapping"));

	}

	public function update(){
		$this->load->model("Fakultas_model");
        $this->load->model("Tktpddk_model");
        $this->load->model("Fakultas_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Fakultas_model->get_map_by_id($req);
        
        $data["tktpddkList"] = $this->Tktpddk_model->get_active_type();
        $data["fakultasList"] = $this->Fakultas_model->get_all_active();

		$this->load->view("Add_mapping_view",$data);
	}

	public function update_type(){
		$this->load->model("Fakultas_model");
		$fakultas_id = $this->input->post("fakultas_id");
		// $fakultas_nm = $this->input->post("fakultas_nm");
		// $info = $this->input->post("info");
		// $active = $this->input->post("active");
		// $dates = date("Y-m-d h:i:s");

        $tkt_pddk = $this->input->post("tkt_pddk");
        $program_studi = $this->input->post("program_studi");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'tkt_pddk_id' => $tkt_pddk,
			'fakultas_id' => $program_studi
		);
		
		$this->Fakultas_model->update_map($fakultas_id,$data);
		redirect(site_url("Mapping"));
	}

	public function delete(){
		$this->load->model("Fakultas_model");
		$typeID = $this->input->get("typeID");

		$this->Fakultas_model->delete_map($typeID);
		redirect(site_url("Mapping"));
	}


}