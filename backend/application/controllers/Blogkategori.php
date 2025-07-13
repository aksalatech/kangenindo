<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Blogkategori extends Custom_CI_Controller
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
		$this->load->model("Blog_model");
		
		$data = array();

		$data['blogList'] = $this->Blog_model->get_all_katblog();

		$this->load->view("Blog_kategori_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Blog_model");

		$data=array();

		$this->load->view("Add_blog_kategori_view",$data);
	}

	public function add_type(){
		$this->load->model("Blog_model");

		$msg="";

		$catKod = $this->input->post("catKod");
		$nameKod = $this->input->post("nameKod");
		$imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$active = $this->input->post("active");

		$dates = date("Y-m-d h:i:s");

		$data = array(
			'blogcategory_code' => $this->security->xss_clean($catKod),
			'blogcategory_name' => $this->security->xss_clean($nameKod),
			'seq_no' => $imageindex,
            'created_date' => $dates,
			'is_active' => $active
		);

		$this->Blog_model->addKat($data);
		redirect(site_url("Blogkategori"));

	}

	public function update(){
		$this->load->model("Blog_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Blog_model->get_blogkat_by_id($req);

		$this->load->view("Add_blog_kategori_view",$data);
	}

	public function update_type(){
		$this->load->model("Blog_model");

		$blogID = $this->input->post("sliderID");
		$catKod = $this->input->post("catKod");
		$nameKod = $this->input->post("nameKod");
		$imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");

		$dates = date("Y-m-d h:i:s");

		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'blogcategory_code' => $this->security->xss_clean($catKod),
			'blogcategory_name' => $this->security->xss_clean($nameKod),
			'seq_no' => $imageindex,
            'created_date' => $dates,
			'is_active' => $active
		);
		$this->Blog_model->updateKat($blogID,$data);
		redirect(site_url("Blogkategori"));
	}

	public function delete(){
		$this->load->model("Blog_model");
		$typeID = $this->input->get("typeID");

		$this->Blog_model->deleteKat($typeID);
		redirect(site_url("Blogkategori"));
	}


}