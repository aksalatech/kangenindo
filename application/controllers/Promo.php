<?php
class Promo extends CI_Controller
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
		$this->load->model("promo_model");
		$this->load->model("Brand_model");
		
		$config=$this->config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();
		$promo=$this->promo_model->get_promo();
		$storeLocation = $this->input->get("store");

		$page = "contact";
		
		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList;
		$data['categoryList'] = $this->category_model->get_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['promo'] = $promo;
		$data['storeLocation'] = $storeLocation;

		$this->load->view("promo_view",$data);
	}

	function regis()
	{
		$this->load->model("config_model");		
		$this->load->model("Team_model");	
		$this->load->model("About_model");
		$this->load->model("Contact_model");
		$this->load->model("banner_model");
		$this->load->model("category_model");
		$this->load->model("promo_model");
		$this->load->model("Brand_model");
		
		$config=$this->config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();
		$promo=$this->promo_model->get_promo();
		$storeLocation = $this->input->get("store");

		$page = "contact";
		
		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList;
		$data['categoryList'] = $this->category_model->get_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['promo'] = $promo;
		$data['storeLocation'] = $storeLocation;

		$this->load->view("promo_regis_view",$data);
	}

	function save_register()
	{
		$this->load->model("config_model");
		$this->load->model("User_model");

		// Get Parameter
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");

		$user = $this->User_model->get_promo_account($email);
		if ($user == null) {
			$dataToInsert = array("name" => $name,
								 "email" => $email,
								 "phone" => $phone,
								 "last_update" => date("Y-m-d H:i:s"));
			$this->User_model->insert_biodata($dataToInsert);

			echo "";
		} else {
			echo "Email has been taken !";
		}
	}

	function save_subscribe()
	{
		$this->load->model("config_model");
		$this->load->model("User_model");

		// Get Parameter
		$email = $this->input->post("email");

		$user = $this->User_model->get_subscribe_email($email);
		if ($user == null) {
			$dataToInsert = array("email" => $email,
								 "last_update" => date("Y-m-d H:i:s"));
			$this->User_model->insert_subscribe($dataToInsert);

			echo "";
		} else {
			echo "Email has been registered !";
		}
	}

	function success()
	{
		$this->load->model("config_model");		
		$this->load->model("Team_model");	
		$this->load->model("About_model");
		$this->load->model("Contact_model");
		$this->load->model("banner_model");
		$this->load->model("category_model");
		$this->load->model("promo_model");
		$this->load->model("Brand_model");
		
		$config=$this->config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();
		$promo=$this->promo_model->get_promo();

		$page = "contact";
		
		$data['error']=0;
		$data['config']=$config; 
		$data['about'] = $about;
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList;
		$data['categoryList'] = $this->category_model->get_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['promo'] = $promo;

		$this->load->view("promo_success_view",$data);
	}

}