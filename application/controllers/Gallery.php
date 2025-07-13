<?php
class Gallery extends CI_Controller
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
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");
		$this->load->model("Image_gallery_model");
		$this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();
		
		$uristore = $this->input->post("store");
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$storeLocation = $this->input->get("store");
		$contact=$this->contact_model->get_contact();

		if (!$isLogin)
			$data['id_admin'] = 0;
		else
			$data['id_admin'] = 2;
		
		$data['error']=0;
		$data['contact'] = $contact;
		$data['config']=$config;
		$data['fulluserList']=$this->user_model->get_full_user();
		$data['categoryList'] = $this->category_model->get_category();
		$data['galleryBintangbroList'] = $this->Image_gallery_model->get_image_gallery_by_category('bintangbro');
		$data['galleryUrbandurianList'] = $this->Image_gallery_model->get_image_gallery_by_category('urbandurian');
		$data['galleryTegukList'] = $this->Image_gallery_model->get_image_gallery_by_category('teguk');
		$data['brandList'] = $this->Brand_model->get_active_brand();
		$data['storeLocation'] = $storeLocation;

		$this->load->view("gallery_view",$data);
	}

	function update_official_store()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("official_store_model");
			
			//Get Parameter
			$uriaddress=$this->input->post('address');
			$address=$this->validate($uriaddress);

			$uriphone=$this->input->post('phone');
			$phone=$this->validate($uriphone);
			
			$urihours=$this->input->post('hours');
			$hours=$this->validate($urihours);

			$urilocation=$this->input->post('location');
			$location=$this->validate($urilocation);
			
			
			$dataToEdit=array(
							"address"=>$address,
							"phone"=>$phone,
							"hours"=>$hours,
							"location"=>$location
						);
			
			$result=$this->official_store_model->update_official_store($dataToEdit);
			
			echo $content;
		}
	}
}