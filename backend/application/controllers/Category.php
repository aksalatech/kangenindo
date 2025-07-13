<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Category extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		// if ($this->session->userdata("position") != POSITION_ADMIN) {
		// 	show_404();
		// }
	}

	public function index(){
		$this->load->model("Category_model");
		$this->load->model("Customer_model");
		
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_branch'] = $this->Customer_model->get_all_type();
		$data['view_type'] = $this->Category_model->get_one_type_by_id($req);
		// $data['view_type'] = $this->Category_model->get_all_type();

		$this->load->view("Category_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Category_model");
		$this->load->model("Customer_model");


		$data=array();
		$data['view_branch'] = $this->Customer_model->get_all_type();

		$this->load->view("Add_category_view",$data);
	}

	public function add_type(){
		$this->load->model("Category_model");

		$msg="";
		$catKod = $this->input->post("catKod");
		$nameKod = $this->input->post("nameKod");
		$imageindex = $this->Category_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$active = $this->input->post("active");
		$brandKod = $this->input->post("brandKod");

		$data = array(
			'category_code' => $this->security->xss_clean($catKod),
			'category_name' => $this->security->xss_clean($nameKod),
			'seq_no' => $imageindex,
			'id_brand' => $brandKod,
			"main_category" => 1,
            'created_date' => $dates,
			'is_active' => $active
		);

		
		$this->Category_model->add($data);
		redirect(site_url("Category"));

	}

	public function update(){
		$this->load->model("Category_model");
		$this->load->model("Customer_model");
		$data = array();

		$req = $this->input->get("typeID");

		

		$data["req"] = $req;
		$data['view_branch'] = $this->Customer_model->get_all_type();
		$data["viewProduct"] = $this->Category_model->get_type_by_id($req);

		$this->load->view("Add_category_view",$data);
	}

	public function update_type(){
		$this->load->model("Category_model");
		$sliderID = $this->input->post("sliderID");
		$catKod = $this->input->post("catKod");
		$nameKod = $this->input->post("nameKod");
		// $imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");

		$brandKod = $this->input->post("brandKod");
		
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'category_code' => $this->security->xss_clean($catKod),
			'category_name' => $this->security->xss_clean($nameKod),
			'id_brand' => $brandKod,
			"main_category" => 1,
            'created_date' => $dates,
			'is_active' => $active
		);
		
		$this->Category_model->update($sliderID,$data);
		redirect(site_url("Category"));
	}

	public function delete(){
		$this->load->model("Category_model");
		$typeID = $this->input->get("typeID");

		$this->Category_model->delete($typeID);
		redirect(site_url("Category"));
	}

	function move_client_up()
	{
			$this->load->model("Category_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Category_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Category_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Category_model->index_down($clientid, $index);

			echo "";
		
	}


}