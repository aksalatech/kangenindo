<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Customer extends Custom_CI_Controller
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
		$this->load->model("Customer_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Customer_model->get_all_type();

		$this->load->view("Customer_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Customer_model");

		$data=array();
		$this->load->view("Add_customer_view",$data);
	}

	public function add_type(){
		$this->load->model("Customer_model");

		$msg="";
		$brand_name = $this->input->post("brand_name");
		$link = $this->input->post("link");
		$seq_no = $this->Customer_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$is_active = $this->input->post("is_active");

		$data = array(
			'brandNm' => $this->security->xss_clean($brand_name),
			'link' => $link,
			'is_active' => $is_active,
			'last_update' => date("Y-m-d H:i:s")
		);

		// if(!empty($_FILES['brand_path']['name'])){
		// 	$config['upload_path'] = './../images/partner/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('brand_path')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$data["brand_path"] = $file['file_name'];
		// }

		$this->Customer_model->add($data);
		redirect(site_url("Customer"));

	}

	public function update(){
		$this->load->model("Customer_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Customer_model->get_type_by_id($req);

		$this->load->view("Add_customer_view",$data);
	}

	public function update_type(){
		$this->load->model("Customer_model");
		$customerID = $this->input->post("customerID");
		$brand_name = $this->input->post("brand_name");
		$link = $this->input->post("link");
		$dates = date("Y-m-d h:i:s");
		$is_active = $this->input->post("is_active");

		$data = array(
			'brandNm' => $this->security->xss_clean($brand_name),
			'link' => $link,
			'is_active' => $is_active,
			'last_update' => date("Y-m-d H:i:s")
		);

		// if(!empty($_FILES['brand_path']['name'])){
		// 	$config['upload_path'] = './../images/partner/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('brand_path')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$data["brand_path"] = $file['file_name'];
		// }
		
		$this->Customer_model->update($customerID,$data);
		redirect(site_url("Customer"));
	}

	public function delete(){
		$this->load->model("Customer_model");
		$typeID = $this->input->get("typeID");

		$this->Customer_model->delete($typeID);
		redirect(site_url("Customer"));
	}

	function move_client_up()
	{
			$this->load->model("Customer_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Customer_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Customer_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Customer_model->index_down($clientid, $index);

			echo "";
		
	}


}