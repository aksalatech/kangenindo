<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Gallerydep extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Gallery_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Gallery_model->get_image_gallery();

		$this->load->view("Gallerydep_view",$data);
	}

	public function gallery_detail(){
		$this->load->model("Gallery_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		
		$id = $this->input->get("typeID");

		$data = array();
		$data["temp"] = $req;
		$data["ids"] = $id;
		$data['view_type'] = $this->Gallery_model->get_detail_gal($id);

		$this->load->view("Gallerydetail_view",$data);
	}

	
	public function add_type_view(){
		$this->load->model("Gallery_model");
        $this->load->model("Category_model");
		$data=array();

        $data['view_cat'] = $this->Category_model->get_all_type();
		$this->load->view("Add_gallerydep_view",$data);
	}

	public function add_type(){
		$this->load->model("Gallery_model");

		$msg="";
		$category = $this->input->post("category");
		$ukuranGal = $this->input->post("ukuranGal");
		
		$dates = date("Y-m-d h:i:s");
		
		$data = array(
			'category_gallery' => $this->security->xss_clean($category),
			'img_size' => $this->security->xss_clean($ukuranGal)
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/gallery/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_name"] = $file['file_name'];
		}

		$this->Gallery_model->adddep($data);
		redirect(site_url("Gallerydep"));

	}

	public function update(){
		$this->load->model("Gallery_model");
        $this->load->model("Category_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Gallery_model->get_image_gallery_by_id($req);

		$this->load->view("Add_gallerydep_view",$data);
	}

	public function update_type(){
		$this->load->model("Gallery_model");
		$sliderID = $this->input->post("sliderID");
		$category = $this->input->post("category");
		$ukuranGal = $this->input->post("ukuranGal");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'category_gallery' => $this->security->xss_clean($category),
			'img_size' => $this->security->xss_clean($ukuranGal)
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/gallery/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_name"] = $file['file_name'];
		}
		
		$this->Gallery_model->updatedep($sliderID,$data);
		redirect(site_url("Gallerydep"));
	}

	public function delete(){
		$this->load->model("Gallery_model");
		$typeID = $this->input->get("typeID");

		$this->Gallery_model->deletedep($typeID);
		redirect(site_url("Gallerydep"));
	}

	

	function move_client_up()
	{
			$this->load->model("Gallery_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Gallery_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Gallery_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Gallery_model->index_down($clientid, $index);

			echo "";
		
	}


}