<?php
class Faq extends CI_Controller
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
		

		$page = "faq";
		
		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList;
		$data['categoryList'] = $this->category_model->get_category();
		$data['faqList'] = $this->faq_model->get_visible_faq();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$storeLocation = $this->input->get("store");

		$this->load->view("faq_view",$data);
	}
}