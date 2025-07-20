<?php
class Events extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library("encryption");
		$this->load->helper("form");
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	function validate($x)
	{
		return $this->db->escape(str_replace("'","`",str_replace('"',"\"",strip_tags(htmlspecialchars($x)))));
	}

	function index()
	{
		$this->load->library('pagination');

		$this->load->model("config_model");		
		$this->load->model("Blog_model");
		$this->load->model("Blogcategory_model");
		$this->load->model("Contact_model");
		$this->load->model("Brand_model");
		$this->load->model("banner_model");
		
		$config=$this->config_model->get_config();
		$contact=$this->Contact_model->get_contact();
		$urikey =$this->input->get("key");
		$storeLocation = $this->input->get("store");

		$data = array();
		$paging = array();

		$data['error']=0;
		$data['config']=$config;
		$data['keywords'] = $urikey;
		$data['storeLocation'] = $storeLocation;

		//konfigurasi pagination
		$paging['base_url'] = base_url().'blog/index'; //site url
        $paging['total_rows'] = $this->db->count_all('msblog'); //total row
        $paging['per_page'] = 8;  //show record per halaman
        $paging["uri_segment"] = 3;  // uri parameter
        $choice = $paging["total_rows"] / $paging["per_page"];
		$paging["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$paging['first_link']       = '<li class="pagination__item pagination__item--prev"><i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i><span>Back</span>';
        $paging['last_link']        = '<li class="pagination__item pagination__item--next"><span>Last</span><i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
        $paging['next_link']        = '<li class="pagination__item pagination__item--next"><span>Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
        $paging['prev_link']        = '<li class="pagination__item pagination__item--prev"><i class="fa fa-angle-left" aria-hidden="true"></i><span>Back</span>';
        $paging['full_tag_open']    = '<ul class="pagination shop__pagination">';
        $paging['full_tag_close']   = '</ul>';
        $paging['num_tag_open']     = '<li class="pagination__item"><span>';
        $paging['num_tag_close']    = '</span></li>';
        $paging['cur_tag_open']     = '<li class="pagination__item pagination__item--active"><span>';
        $paging['cur_tag_close']    = '</span></li>';
        $paging['next_tag_open']    = '';
        $paging['next_tagl_close']  = '';
        $paging['prev_tag_open']    = '';
        $paging['prev_tagl_close']  = '';
        $paging['first_tag_open']   = '';
        $paging['first_tagl_close'] = '';
        $paging['last_tag_open']    = '';
		$paging['last_tagl_close']  = '';

		$this->pagination->initialize($paging);
		$page = "events";
		$data['page'] = ($this->uri->segment(3) == null) ? 0 : $this->uri->segment(3); 
        $data['blogList'] = $this->Blog_model->get_blog($urikey, $paging["per_page"], $data["page"]);
		$data['pagination'] = $this->pagination->create_links();

		$data['categoryList'] = $this->Blogcategory_model->get_list_count_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['contact'] = $contact;
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList; 
		
		
		$this->load->view("blog_view",$data);
	}

	function detail($id)
	{
		$this->load->model("config_model");		
		$this->load->model("Blog_model");
		$this->load->model("Contact_model");
		$this->load->model("Banner_model");	
		$this->load->model("Brand_model");
		
		$config=$this->config_model->get_config();
		$blog=$this->Blog_model->get_blog_by_id($id);
		$contact=$this->Contact_model->get_contact();
		$storeLocation = $this->input->get("store");
		
		$data['error']=0;
		$data['config']=$config;
		$data['blog']=$blog;
		$data['contact'] = $contact;
		$page = "location";
		$bannerList = $this->Banner_model->get_banner_page($page);
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['banner'] = $bannerList; 
		$data['storeLocation'] = $storeLocation;

		$this->load->view("blog_detail_view",$data);
	}

	function category($id)
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
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$blog = $this->blog_model->get_blog_by_category($id);
		if (!$isLogin)
			$data['id_admin']= 0;
		else
			$data['id_admin']= 2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['iconList'] = $this->icon_model->get_icon();
		$data['blog'] = $blog;
		// $data['next'] = $this->blog_model->get_next_id($blog->ID_blog);
		// $data['prev'] = $this->blog_model->get_prev_id($blog->ID_blog);
		$data['bookingList'] = $this->booking_model->get_booking();
		$data['aboutList']=$this->about_model->get_about();
		$data['contactList']=$this->contact_model->get_contact();
		$data['blogcategoryList']=$this->blogcategory_model->get_category();
		$data['blogtagsList']=$this->blogtags_model->get_tags();
		$data['recentblogList']=$this->blog_model->get_recentblog();
		$data['fullblogtagsList']=$this->blogtags_model->get_full_category();
		$data['fullblogcategoryList']=$this->blog_model->get_blog_category($id);
		$data['fullblogcateList']=$this->blogcategory_model->get_full_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();

		$this->load->view("blog_category_view", $data);
	}

	function tags($id)
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
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$blog = $this->blog_model->get_blog_by_category($id);
		if (!$isLogin)
			$data['id_admin']= 0;
		else
			$data['id_admin']= 2;
		
		$data['error']=0;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['iconList'] = $this->icon_model->get_icon();
		$data['blog'] = $blog;
		// $data['next'] = $this->blog_model->get_next_id($blog->ID_blog);
		// $data['prev'] = $this->blog_model->get_prev_id($blog->ID_blog);
		$data['bookingList'] = $this->booking_model->get_booking();
		$data['aboutList']=$this->about_model->get_about();
		$data['contactList']=$this->contact_model->get_contact();
		$data['blogcategoryList']=$this->blogcategory_model->get_category();
		$data['blogtagsList']=$this->blogtags_model->get_tags();
		$data['recentblogList']=$this->blog_model->get_recentblog();
		$data['fullblogtagsList']=$this->blogtags_model->get_full_category();
		$data['fullblogcategoryList']=$this->blog_model->get_blog_category($id);
		$data['fullblogcateList']=$this->blogcategory_model->get_full_category();
		$data['brandList'] = $this->Brand_model->get_active_brand();

		$this->load->view("blog_tags_view", $data);
	}

}