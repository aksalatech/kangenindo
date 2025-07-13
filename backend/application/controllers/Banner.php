<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Banner extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Banner_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Banner_model->get_banner();

		$this->load->view("Banner_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Banner_model");
		$data=array();

		$this->load->view("Add_banner_view",$data);
	}

	public function add_type(){
		$this->load->model("Banner_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$link = $this->input->post("link");
		$imagedesc = $this->input->post("imagedesc");
		$active = $this->input->post("active");
		$dates = date("Y-m-d h:i:s");

		$data = array(
			'title' => $this->security->xss_clean($imagetitle),
			'content' => $this->security->xss_clean($imagedesc),
			'link' => $link,
			'active' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_small"] = $file['file_name'];
		}

        if(!empty($_FILES['imagepath2']['name'])){
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath2')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_banner"] = $file['file_name'];
		}

		$this->Banner_model->add($data);
		redirect(site_url("Banner"));

	}

	public function update(){
		$this->load->model("Banner_model");
        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Banner_model->get_type_by_id($req);

		$this->load->view("Add_banner_view",$data);
	}

	public function update_type(){
		$this->load->model("Banner_model");
		$sliderID = $this->input->post("sliderID");
		$imagetitle = $this->input->post("imagetitle");
		$link = $this->input->post("link");
		$imagedesc = $this->input->post("imagedesc");
		$active = $this->input->post("active");
		// $imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$active = $this->input->post("active");

		$data = array(
			'title' => $this->security->xss_clean($imagetitle),
			'content' => $this->security->xss_clean($imagedesc),
			'link' => $link,
			'active' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_small"] = $file['file_name'];
		}

        if(!empty($_FILES['imagepath2']['name'])){
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath2')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["img_banner"] = $file['file_name'];
		}
		
		$this->Banner_model->update($sliderID,$data);
		redirect(site_url("Banner"));
	}

	public function delete(){
		$this->load->model("Banner_model");
		$typeID = $this->input->get("typeID");

		$this->Banner_model->delete($typeID);
		redirect(site_url("Banner"));
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