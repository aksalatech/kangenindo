<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Books extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		if ($this->session->userdata("position") != POSITION_SUPERADMIN) {
			show_404();
		}
	}

	public function index(){
		$this->load->model("Book_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Book_model->get_all_type();

		$this->load->view("Book_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Book_model");
		$data=array();

        $data['view_cat'] = $this->Book_model->get_all_type();
		$this->load->view("Add_book_view",$data);
	}

	public function add_type(){
		$this->load->model("Book_model");

		$msg="";
		$judulbook = $this->input->post("judulbook");
		$sinopsis = $this->input->post("sinopsis");
		$imageindex = $this->Book_model->get_index();
		$dates = date("Y-m-d h:i:s");
		

		$data = array(
			'title' => $this->security->xss_clean($judulbook),
			'synopsys' => $this->security->xss_clean($sinopsis),
			'seq_no' => $imageindex
			// 'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/publikasi/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["picture"] = $file['file_name'];
		}

		$this->Book_model->add($data);
		redirect(site_url("Books"));

	}

	public function update(){
		$this->load->model("Book_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Book_model->get_type_by_id($req);

		$this->load->view("Add_book_view",$data);
	}

	public function update_type(){
		$this->load->model("Book_model");
		$sliderID = $this->input->post("sliderID");
		$judulbook = $this->input->post("judulbook");
		$sinopsis = $this->input->post("sinopsis");
		// $imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'title' => $this->security->xss_clean($judulbook),
			'synopsys' => $this->security->xss_clean($sinopsis)
			// 'seq_no' => $imageindex
			// 'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/publikasi/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["picture"] = $file['file_name'];
		}
		
		$this->Book_model->update($sliderID,$data);
		redirect(site_url("Books"));
	}

	public function delete(){
		$this->load->model("Book_model");
		$typeID = $this->input->get("typeID");

		$this->Book_model->delete($typeID);
		redirect(site_url("Books"));
	}

	function move_client_up()
	{
			$this->load->model("Book_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Book_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Book_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Book_model->index_down($clientid, $index);

			echo "";
		
	}


}