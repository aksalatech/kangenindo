<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Slider extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		// if ($this->session->userdata("position") != POSITION_SUPERADMIN) {
		// 	show_404();
		// }
	}

	public function index(){
		$this->load->model("Slider_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Slider_model->get_all_type();

		$this->load->view("Slider_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Slider_model");

		$data=array();
		$this->load->view("Add_slider_view",$data);
	}

	public function add_type(){
		$this->load->model("Slider_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$content = $this->input->post("content");
		$imageindex = $this->Slider_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$url_link = $this->input->post("url_link");
		$active = $this->input->post("active");

		$data = array(
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'content' => $this->security->xss_clean($content),
			'imageindex' => $imageindex,
			'url_link' => $this->security->xss_clean($url_link),
			'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/slider/';
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

		$this->Slider_model->add($data);
		redirect(site_url("Slider"));

	}

	public function update(){
		$this->load->model("Slider_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Slider_model->get_type_by_id($req);

		$this->load->view("Add_slider_view",$data);
	}

	public function update_type(){
		$this->load->model("Slider_model");
		$sliderID = $this->input->post("sliderID");
		$imagetitle = $this->input->post("imagetitle");
		$content = $this->input->post("content");
		// $imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$url_link = $this->input->post("url_link");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'imagetitle' => $this->security->xss_clean($imagetitle),
			'content' => $this->security->xss_clean($content),
			// 'imageindex' => $imageindex,
			'url_link' => $this->security->xss_clean($url_link),
			'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/slider/';
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
		
		$this->Slider_model->update($sliderID,$data);
		redirect(site_url("Slider"));
	}

	public function delete(){
		$this->load->model("Slider_model");
		$typeID = $this->input->get("typeID");

		$this->Slider_model->delete($typeID);
		redirect(site_url("Slider"));
	}

	function move_client_up()
	{
			$this->load->model("Slider_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Slider_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Slider_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Slider_model->index_down($clientid, $index);

			echo "";
		
	}


}