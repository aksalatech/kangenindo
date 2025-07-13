<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Team extends Custom_CI_Controller
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
		$this->load->model("Team_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Team_model->get_all_type();

		$this->load->view("Team_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Team_model");
		$data=array();

        $data['view_cat'] = $this->Team_model->get_all_type();
		$this->load->view("Add_team_view",$data);
	}

	public function add_type(){
		$this->load->model("Team_model");

		$msg="";
		$namateam = $this->input->post("namateam");
		$katTeam = $this->input->post("katTeam");
		$imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$posisi = $this->input->post("posisi");
		$active = $this->input->post("active");

		$data = array(
			'name' => $this->security->xss_clean($namateam),
			'position_name' => $this->security->xss_clean($posisi),
			'seq_no' => $imageindex,
			'category' => $this->security->xss_clean($katTeam)
			// 'visible' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/team/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["photo_path"] = $file['file_name'];
		}

		$this->Team_model->add($data);
		redirect(site_url("Team"));

	}

	public function update(){
		$this->load->model("Team_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Team_model->get_type_by_id($req);

		$this->load->view("Add_team_view",$data);
	}

	public function update_type(){
		$this->load->model("Team_model");
		$sliderID = $this->input->post("sliderID");
		$namateam = $this->input->post("namateam");
		$katTeam = $this->input->post("katTeam");
		$imageindex = $this->input->post("imageindex");
		$dates = date("Y-m-d h:i:s");
		$posisi = $this->input->post("posisi");
		$active = $this->input->post("active");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'name' => $this->security->xss_clean($namateam),
			'position_name' => $this->security->xss_clean($posisi),
			'seq_no' => $imageindex,
			'category' => $this->security->xss_clean($katTeam)
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/team/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["photo_path"] = $file['file_name'];
		}
		
		$this->Team_model->update($sliderID,$data);
		redirect(site_url("Team"));
	}

	public function delete(){
		$this->load->model("Team_model");
		$typeID = $this->input->get("typeID");

		$this->Team_model->delete($typeID);
		redirect(site_url("Team"));
	}


}