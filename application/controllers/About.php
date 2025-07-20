<?php
class About extends CI_Controller
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
		$this->load->model("Brand_model");
		$this->load->model("category_model");
		$this->load->model("Image_about_model");
		
		$config=$this->config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();
		$storeLocation = $this->input->get("store");

		$page = "about";

		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$data['categoryList'] = $this->category_model->get_category();
		$data['imageList'] = $this->Image_about_model->get_image_about();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['storeLocation'] = $storeLocation;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList; 

		$this->load->view("about_view",$data);
	}

}