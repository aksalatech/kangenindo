<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Brand extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Brand_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Gallery_model->get_all_type();

		$this->load->view("Brand_view",$data);
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

	
	public function add_type_view_detail(){
		$this->load->model("Gallery_model");
        $this->load->model("Category_model");
		$data=array();
		$id = $this->input->get("typeID");
		
		$data["ids"] = $id;
		

		$this->load->view("Add_gallery_view_detail",$data);
	}

	public function update_detail(){
		$this->load->model("Gallery_model");
        
		$data = array();

		$req = $this->input->get("typeID");
		$imageid = $this->input->get("imageid");

		$data["ids"] = $imageid;
		$data["req"] = $req;
		$data["viewProduct"] = $this->Gallery_model->get_detail_by_id($req);

		$this->load->view("Add_gallery_view_detail",$data);
	}

	public function update_type_detail(){
		$this->load->model("Gallery_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$ukuranGal = $this->input->post("ukuranGal");
		$ids = $this->input->post("ids");
		$imageindex =$this->Gallery_model->get_index_detail();
		$sliderID = $this->input->post("sliderID");
		$dates = date("Y-m-d h:i:s");
		
		$active = $this->input->post("active");

		$data = array(
			'imageid' => $this->security->xss_clean($ids),
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'imageindex' => $imageindex,
			'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/gallery/detail/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["imagepath"] = $file['file_name'];
		}

		$this->Gallery_model->updatedetail($sliderID,$data);
		redirect(site_url("Gallery/gallery_detail?typeID=".$ids));
	}

	public function delete_detail(){
		$this->load->model("Gallery_model");
		$typeID = $this->input->get("typeID");
		$ids = $this->input->get("ids");

		$this->Gallery_model->delete_detail($typeID);
		redirect(site_url("Gallery/gallery_detail?typeID=".$ids));
	}

	public function add_type_detail(){
		$this->load->model("Gallery_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$ukuranGal = $this->input->post("ukuranGal");
		$ids = $this->input->post("ids");
		$imageindex =$this->Gallery_model->get_index_detail();
		$dates = date("Y-m-d h:i:s");
		
		$active = $this->input->post("active");

		$data = array(
			'imageid' => $this->security->xss_clean($ids),
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'imageindex' => $imageindex,
			'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/gallery/detail/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["imagepath"] = $file['file_name'];
		}

		$this->Gallery_model->adddetail($data);
		redirect(site_url("Gallery/gallery_detail?typeID=".$ids));

	}

	public function add_type_view(){
		$this->load->model("Gallery_model");
        $this->load->model("Category_model");
		$data=array();

        $data['view_cat'] = $this->Category_model->get_all_type();
		$this->load->view("Add_gallery_view",$data);
	}

	public function add_type(){
		$this->load->model("Gallery_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$imagetitle2 = $this->input->post("imagetitle2");
		$price = $this->input->post("price");
		$addprice = $this->input->post("addprice");
		$imagedesc = $this->input->post("imagedesc");
		
		$imageindex =$this->Gallery_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$catKod = $this->input->post("catKod");
		$active = $this->input->post("active");

		$data = array(
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'imagetitle2' => $this->security->xss_clean($imagetitle2),
			'price' => $price,
			'additional_price' => $addprice,
			'imagedesc' => $imagedesc,
			'imageindex' => $imageindex,
			'id_category' => $this->security->xss_clean($catKod),
			'visible' => $active
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
			$data["imagepath"] = $file['file_name'];
		}

		$this->Gallery_model->add($data);
		redirect(site_url("Gallery"));

	}

	public function update(){
		$this->load->model("Gallery_model");
        $this->load->model("Category_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
        $data['view_cat'] = $this->Category_model->get_all_type();
		$data["viewProduct"] = $this->Gallery_model->get_type_by_id($req);

		$this->load->view("Add_gallery_view",$data);
	}

	public function update_type(){
		$this->load->model("Gallery_model");
		$sliderID = $this->input->post("sliderID");
		$imagetitle = $this->input->post("imagetitle");
		$imagetitle2 = $this->input->post("imagetitle2");
		$price = $this->input->post("price");
		$addprice = $this->input->post("addprice");
		$imagedesc = $this->input->post("imagedesc");
		// $imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$catKod = $this->input->post("catKod");
		$active = $this->input->post("active");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'imagetitle2' => $this->security->xss_clean($imagetitle2),
			'price' => $price,
			'additional_price' => $addprice,
			'imagedesc' => $imagedesc,
			'id_category' => $this->security->xss_clean($catKod),
			'visible' => $active
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
			$data["imagepath"] = $file['file_name'];
		}
		
		$this->Gallery_model->update($sliderID,$data);
		redirect(site_url("Gallery"));
	}

	public function delete(){
		$this->load->model("Gallery_model");
		$typeID = $this->input->get("typeID");

		$this->Gallery_model->delete($typeID);
		redirect(site_url("Gallery"));
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