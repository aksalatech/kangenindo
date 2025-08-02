<?php
class Menu extends CI_Controller
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
	
	function index($admin=NULL)
	{
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		$page = "menu";
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$storeLocation = $this->input->get("store");
		// $brand = $this->input->get("brand");
		$contact=$this->contact_model->get_contact();
		
		if (!$isLogin)
			$data['id_admin']=0;
		else
			$data['id_admin']=2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['contact'] = $contact;
		// $data['brands'] = $this->Brand_model->get_one_brand($brand);
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['aboutList']=$this->about_model->get_about();
		$imageList=$this->image_model->get_visible_image();
		$bannerList = $this->banner_model->get_banner_page($page);
		// $data['fullimageList']=$this->image_model->get_full_image_by_brand($brand);
		$data['categoryList'] = $this->category_model->get_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['imageList']=$imageList;
		$data['banner'] = $bannerList;
		$data['storeLocation'] = $storeLocation;
		
	
		$this->load->view("menu_view",$data);
	}

	function category($id)
	{
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		$page = "menu";
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$contact=$this->contact_model->get_contact();
		$storeLocation = $this->input->get("store");
		
		if (!$isLogin)
			$data['id_admin']=0;
		else
			$data['id_admin']=2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['aboutList']=$this->about_model->get_about();
		$data['contact'] = $contact;
		$imageList=$this->image_model->get_image_by_category($id);
		$bannerList = $this->banner_model->get_banner_page($page);
		$category = $this->category_model->get_category_by_id($id);
		$data['fullimageList']=$this->image_model->get_full_image();
		$data['categoryList'] = $this->category_model->get_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['imageList']=$imageList;
		$data['banner'] = $bannerList;
		$data['category'] = $category;
		$data['storeLocation'] = $storeLocation;
		
	
		$this->load->view("menu_category_view",$data);
	}
	
	function detail($id)
	{
		$this->load->model("user_model");
		$this->load->model("slider_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("event_model");
		$this->load->model("how_model");
		$this->load->model("plan_model");
		$this->load->model("why_model");
		$this->load->model("fact_model");
		$this->load->model("testimoni_model");
		$this->load->model("category_model");
		$this->load->model("customer_model");
		$this->load->model("team_model");
		$this->load->model("icon_model");
		$this->load->model("blog_model");
		$this->load->model("booking_model");
		$this->load->model("service_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		$n = $this->config->item("limit_news");
		$image = $this->image_model->get_image_by_id($id);
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$contact=$this->contact_model->get_contact();
		$storeLocation = $this->input->get("store");

		if (!$isLogin)
			$data['id_admin']=0;
		else
			$data['id_admin']=2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['contact'] = $contact;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['sliderList']=$this->slider_model->get_visible_image();
		$data['fullsliderList']=$this->slider_model->get_full_image();
		$data['fullclientList']=$this->customer_model->get_full_client();
		$data['aboutList']=$this->about_model->get_about();
		$data['contactList']=$this->contact_model->get_contact();
		$data['planList']=$this->plan_model->get_top_plan(3);
		$data['planDetailList'] = $this->plan_model->get_plan_detail();
		$imageList=$this->image_model->get_visible_image();
		$data['fullimageList']=$this->image_model->get_full_image();
		$data['fulleventsList']=$this->event_model->get_all_event();
		$data['eventsList']=$this->event_model->get_visible_event();
		$data['howList'] = $this->how_model->get_how();
		$data['whyList'] = $this->why_model->get_why();
		$data['fact'] = $this->fact_model->get_fact();
		$data['testimoniList'] = $this->testimoni_model->get_testimoni();
		$data['categoryList'] = $this->category_model->get_category();
		$data['fullcategoryList'] = $this->category_model->get_full_category();
		$data['customerList'] = $this->customer_model->get_customer();
		$data['teamList'] = $this->team_model->get_team();
		$detailImageList=$this->event_model->get_full_image();
		$data['imageList']=$imageList;
		$data['iconList'] = $this->icon_model->get_icon();
		$data['blogList'] = $this->blog_model->get_limit_blog($n);
		$data['fullblogList'] = $this->blog_model->get_full_blog();
		$data['bookingList'] = $this->booking_model->get_booking();
		$data['servicesList']=$this->service_model->get_visible_service();
		$data['recentimageList']=$this->image_model->get_recent_image();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['image'] = $image;
		$data['storeLocation'] = $storeLocation;
		

		$this->load->view("menu_detail",$data);
    
	}

	public function getDetailMenu() {
        $this->load->model('image_model');

		$id = $this->input->post('id');
		
        $menuDetail = $this->image_model->get_image_by_id($id);

        // Kembalikan data dalam bentuk JSON
        echo json_encode($menuDetail);
    }
}