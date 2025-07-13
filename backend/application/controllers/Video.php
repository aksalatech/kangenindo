<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Video extends Custom_CI_Controller
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
		$this->load->model("Video_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Video_model->get_all_type();

		$this->load->view("Video_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Video_model");
		$data=array();

        $data['view_cat'] = $this->Video_model->get_all_type();
		$this->load->view("Add_video_view",$data);
	}

	public function add_type(){
		$this->load->model("Video_model");

		$msg="";
		$vidtitle = $this->input->post("vidtitle");
        $descvid = $this->input->post("descvid");
        $vidlink = $this->input->post("vidlink");
		$seq_no = $this->Video_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$is_active = $this->input->post("is_active");
		

		$data = array(
			'videotitle' => $this->security->xss_clean($vidtitle),
			'videodesc' => $this->security->xss_clean($descvid),
            'videopath' => $this->security->xss_clean($vidlink),
			'visible' => $is_active,
			'videoindex' => $seq_no
			// 'visible' => $active
		);

		
		$this->Video_model->add($data);
		redirect(site_url("Video"));

	}

	public function update(){
		$this->load->model("Video_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Video_model->get_type_by_id($req);

		$this->load->view("Add_video_view",$data);
	}

	public function update_type(){
		$this->load->model("Video_model");
        $sliderID = $this->input->post("sliderID");
		$vidtitle = $this->input->post("vidtitle");
        $descvid = $this->input->post("descvid");
        $vidlink = $this->input->post("vidlink");
		$seq_no = $this->Video_model->get_index();
		$dates = date("Y-m-d h:i:s");
		$is_active = $this->input->post("is_active");

		$data = array(
			'videotitle' => $this->security->xss_clean($vidtitle),
			'videodesc' => $this->security->xss_clean($descvid),
            'videopath' => $this->security->xss_clean($vidlink),
			'visible' => $is_active
            // 'visible' => $active
		);

		
		$this->Video_model->update($sliderID,$data);
		redirect(site_url("Video"));
	}

	public function delete(){
		$this->load->model("Video_model");
		$typeID = $this->input->get("typeID");

		$this->Video_model->delete($typeID);
		redirect(site_url("Video"));
	}

	function move_client_up()
	{
			$this->load->model("Video_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Video_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Video_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Video_model->index_down($clientid, $index);

			echo "";
		
	}


}