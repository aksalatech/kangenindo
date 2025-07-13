<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Frequent extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Frequent_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Frequent_model->get_all_faq();

		$this->load->view("Frequent_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Frequent_model");

		$data=array();
		$this->load->view("Add_faq_view",$data);
	}

	public function add_type(){
		$this->load->model("Frequent_model");

		$msg="";
		$faq_title = $this->input->post("faq_title");
		$faq_desc = $this->input->post("faq_desc");
        $active = $this->input->post("active");
		$faqtype = $this->input->post("faqtype");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'faq_title' => $faq_title,
			'faq_desc' => $faq_desc,
			'active' => $active,
			'faq_type' => $faqtype
		);

		$this->Frequent_model->add($data);
		redirect(site_url("Frequent"));

	}

	public function update(){
		$this->load->model("Frequent_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Frequent_model->get_one_faq_by_id($req);

		$this->load->view("Add_faq_view",$data);
	}

	public function update_type(){
		$this->load->model("Frequent_model");
		$faq_title = $this->input->post("faq_title");
		$faq_desc = $this->input->post("faq_desc");
        $active = $this->input->post("active");
        $catID = $this->input->post("catID");
		$faqtype = $this->input->post("faqtype");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'faq_title' => $faq_title,
			'faq_desc' => $faq_desc,
			'active' => $active,
			'faq_type' => $faqtype
		);
		
		$this->Frequent_model->update($catID,$data);
		redirect(site_url("Frequent"));
	}

	public function delete(){
		$this->load->model("Frequent_model");
		$typeID = $this->input->get("typeID");

		$this->Frequent_model->delete($typeID);
		redirect(site_url("Frequent"));
	}


}