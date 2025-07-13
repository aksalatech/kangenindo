<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Testimony extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Testimony_model");
		// if ($this->input->post("action")==null) {
		// 	$req = "";	
		// }
		// else{
		// 	$req = $this->input->post("action");
		// }
		$data = array();

        $data['view_type'] = $this->Testimony_model->get_all_type();

		$this->load->view("Testimony_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Testimony_model");
       
		$data=array();

        $data['view_cat'] = $this->Testimony_model->get_all_type();
		$this->load->view("Add_testimony_view",$data);
	}

	public function add_type(){
		$this->load->model("Testimony_model");

		$msg="";
		$nametestimon = $this->input->post("nametestimon");
		
		$testimonydesc = $this->input->post("testimonydesc");
		$active = $this->input->post("active");
		$rating = $this->input->post("rating");
		
		$imageindex =$this->Testimony_model->get_index();
		$dates = date("Y-m-d h:i:s");
		

		$data = array(
			'name' => $this->security->xss_clean($nametestimon),
			'desc_testimoni' => $this->security->xss_clean($testimonydesc),
			'seq_no' => $imageindex,
			'rating' => $rating
		);

		// if(!empty($_FILES['testipcpath']['name'])){
		// 	$config['upload_path'] = './../images/testimony/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '40096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('testipcpath')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$data["testipcpath"] = $file['file_name'];
		// }

		$this->Testimony_model->add($data);
		redirect(site_url("Testimony"));

	}

	public function update(){
		$this->load->model("Testimony_model");
        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Testimony_model->get_type_by_id($req);

		$this->load->view("Add_testimony_view",$data);
	}

	public function update_type(){
		$this->load->model("Testimony_model");
		$sliderID = $this->input->post("sliderID");
		$nametestimon = $this->input->post("nametestimon");
		
		$testimonydesc = $this->input->post("testimonydesc");
		$active = $this->input->post("active");
		$rating = $this->input->post("rating");
		$imageindex =$this->Testimony_model->get_index();
		$dates = date("Y-m-d h:i:s");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'name' => $this->security->xss_clean($nametestimon),
			'desc_testimoni' => $this->security->xss_clean($testimonydesc),
			'rating' => $rating
		);

		// if(!empty($_FILES['testipcpath']['name'])){
		// 	$config['upload_path'] = './../images/testimony/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '40096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('testipcpath')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$data["testipcpath"] = $file['file_name'];
		// }
		
		$this->Testimony_model->update($sliderID,$data);
		redirect(site_url("Testimony"));
	}

	public function delete(){
		$this->load->model("Testimony_model");
		$typeID = $this->input->get("typeID");

		$this->Testimony_model->delete($typeID);
		redirect(site_url("Testimony"));
	}

	
	function move_client_up()
	{
			$this->load->model("Testimony_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Testimony_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Testimony_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Testimony_model->index_down($clientid, $index);

			echo "";
		
	}


}