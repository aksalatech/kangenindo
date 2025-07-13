<?php
class Franchise extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->library("encryption");
		$this->load->helper("form");
		$this->load->database();
	}
	
	function validate($x)
	{
		return $this->db->escape(str_replace("'","`",str_replace('"',"\"",strip_tags(htmlspecialchars($x)))));
	}
	
	function index()
	{
		$this->load->model("config_model");		
		$this->load->model("Team_model");	
		$this->load->model("About_model");
		$this->load->model("Contact_model");
		$this->load->model("banner_model");
		$this->load->model("category_model");
		$this->load->model("faq_model");
		$this->load->model("Brand_model");
		
		$config=$this->config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();
		$storeLocation = $this->input->get("store");

		$page = "contact";
		
		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList;
		$data['categoryList'] = $this->category_model->get_category();
		$data['faqList'] = $this->faq_model->get_visible_faq();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['storeLocation'] = $storeLocation;

		$this->load->view("franchise_view",$data);
	}

	function save_franchise()
	{
		$this->load->model("config_model");
		$this->load->model("Contact_model");

		// Get Parameter
		$brand = $this->input->post("brand");
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$state = $this->input->post("state");
		$zip = $this->input->post("zip");
		$willing_travel = $this->input->post("willing_travel");
		$fulltime_operator = $this->input->post("fulltime_operator");
		$liquid_assets = $this->input->post("liquid_assets");
		$where_find = $this->input->post("where_find");
		$message = $this->input->post("message");
		$invests = $this->input->post("invests");

		$dataToInsert = array("brand" => $brand,
							 "first_name" => $first_name,
							 "last_name" => $last_name,
							 "email" => $email,
							 "phone" => $phone,
							 "state" => $state,
							 "zip" => $zip,
							 "willing_travel" => $willing_travel,
							 "fulltime_operator" => $fulltime_operator,
							 "liquid_assets" => $liquid_assets,
							 "where_find" => $where_find,
							 "message" => $message,
							 "invests" => $invests,
							 "last_update" => date("Y-m-d H:i:s"));
		$this->Contact_model->insert_franchise_req($dataToInsert);

		echo "";
	}

}