<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Timeline extends Custom_CI_Controller
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
		$this->load->model("Timeline_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Timeline_model->get_all_type();

		$this->load->view("Timeline_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Timeline_model");

		$data=array();
		$this->load->view("Add_timeline_view",$data);
	}

	public function add_type(){
		$this->load->model("Timeline_model");

		$msg="";
		$title = $this->input->post("title");
		$content = $this->input->post("content");
		$seq_no = $this->Timeline_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$year = $this->input->post("year");

		$data = array(
			'title' => $this->security->xss_clean($title),
			'content' => $this->security->xss_clean($content),
			'seq_no' => $seq_no,
			'year' => $year
		);

		$this->Timeline_model->add($data);
		redirect(site_url("Timeline"));

	}

	public function update(){
		$this->load->model("Timeline_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Timeline_model->get_type_by_id($req);

		$this->load->view("Add_timeline_view",$data);
	}

	public function update_type(){
		$this->load->model("Timeline_model");
		$id_timeline = $this->input->post("id_timeline");
		$title = $this->input->post("title");
		$content = $this->input->post("content");
		// $seq_no = $this->input->post("seq_no");
		$dates = date("Y-m-d h:i:s");
		$year = $this->input->post("year");

		$data = array(
			'title' => $this->security->xss_clean($title),
			'content' => $this->security->xss_clean($content),
			// 'seq_no' => $seq_no,
			'year' => $this->security->xss_clean($year)
		);
		
		$this->Timeline_model->update($id_timeline,$data);
		redirect(site_url("Timeline"));
	}

	public function delete(){
		$this->load->model("Timeline_model");
		$typeID = $this->input->get("typeID");

		$this->Timeline_model->delete($typeID);
		redirect(site_url("Timeline"));
	}

	function move_client_up()
	{
			$this->load->model("Timeline_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Timeline_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Timeline_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Timeline_model->index_down($clientid, $index);

			echo "";
		
	}


}