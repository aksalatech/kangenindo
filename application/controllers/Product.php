<?php
class Product extends CI_Controller
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
		$this->load->model("roder_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		$n = $this->config->item("limit_news");
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		if (!$isLogin)
			$data['id_admin'] = 0;
		else
			$data['id_admin'] = 2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['sliderList']=$this->slider_model->get_visible_image();
		$data['fullsliderList']=$this->slider_model->get_full_image();
		$data['aboutList']=$this->about_model->get_about();
		$data['roderList']=$this->roder_model->get_roder();
		// $data['roderOpsiList']=$this->roder_model->get_full_opsi();
		$data['contactList']=$this->contact_model->get_contact();
		$data['planList']=$this->plan_model->get_plan();
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
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$this->load->view("roder_view",$data);
	}

	function detail($id)
	{
		$this->load->model("user_model");
		$this->load->model("config_model");	
		$this->load->model("icon_model");
		$this->load->model("blog_model");
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("booking_model");
		$this->load->model("blogcategory_model");
		$this->load->model("blogtags_model");
		$this->load->model("roder_model");
		$this->load->model("plan_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$blog = $this->blog_model->get_blog_by_id($id);
		$product = $this->plan_model->get_plan_by_id($id);

		if (!$isLogin)
			$data['id_admin']= 0;
		else
			$data['id_admin']= 2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['iconList'] = $this->icon_model->get_icon();
		$data['blog'] = $blog;
		$data['product'] = $product;
		$data['planList']=$this->plan_model->get_plan();
		$data['planOpsiList']=$this->plan_model->get_plan_detail_opsi($id);
		$data['planLebarList']=$this->plan_model->get_plan_detail_lebar($id);
		$data['planPanjangList']=$this->plan_model->get_plan_detail_panjang($id);
		$data['planAksesorisList']=$this->plan_model->get_plan_detail_aksesoris($id);
		// $data['next'] = $this->blog_model->get_next_id($blog->ID_blog);
		// $data['prev'] = $this->blog_model->get_prev_id($blog->ID_blog);
		$data['bookingList'] = $this->booking_model->get_booking();
		$data['aboutList']=$this->about_model->get_about();
		$data['roderList']=$this->roder_model->get_roder();
		$data['contactList']=$this->contact_model->get_contact();
		$data['blogcategoryList']=$this->blogcategory_model->get_category();
		$data['blogtagsList']=$this->blogtags_model->get_tags();
		$data['recentblogList']=$this->blog_model->get_recentblog();
		$data['fullblogtagsList']=$this->blogtags_model->get_full_category();
		$data['fullblogcateList']=$this->blogcategory_model->get_full_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();

		$this->load->view("product_view", $data);
	}
}