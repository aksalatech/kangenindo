<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Promotion extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index(){
		$this->load->model("Promotion_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}
		$data = array();
		$data["temp"] = $req;
		$data['view_type'] = $this->Promotion_model->get_all_type();

		$this->load->view("Promotion_view",$data);
	}
	
	public function add_type_view(){
		// $this->load->model("Gallery_model");
        // $this->load->model("Category_model");
		$data=array();

        // $data['view_cat'] = $this->Category_model->get_all_type();
		$this->load->view("Add_promotion_view",$data);
	}

	public function add_type(){
		$this->load->model("Promotion_model");

		$msg="";
		$imagetitle = $this->input->post("imagetitle");
		$imagetitle2 = $this->input->post("imagetitle2");
		$imagedesc = $this->input->post("imagedesc");
		$blog_text = $this->input->post("kt-kontenEditor");
        $disc_amt = $this->input->post("disc_amt");
        $disc_type = $this->input->post("disc_type");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $promo_code = $this->input->post("promo_code");
        $link = $this->input->post("link");
		
		$dates = date("Y-m-d h:i:s");
		$active = $this->input->post("active");

		$data = array(
			'title' => $this->security->xss_clean($imagetitle),
			'subtitle' => $this->security->xss_clean($imagetitle2),
            'description' => $this->security->xss_clean($imagedesc),
            'info' => $this->security->xss_clean($blog_text),
            'disc_off' => $this->security->xss_clean($disc_amt),
            'disc_type' => $this->security->xss_clean($disc_type),
            'start_date' => $this->security->xss_clean($start_date),
            'end_date' => $this->security->xss_clean($end_date),
            'promo_code' => $this->security->xss_clean($promo_code),
            'link' => $this->security->xss_clean($link),
			'active' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/promo/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["image"] = $file['file_name'];
		}

		$this->Promotion_model->add($data);
		redirect(site_url("Promotion"));

	}

	public function update(){
		$this->load->model("Promotion_model");
        $this->load->model("Category_model");

        
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
        
		$data["viewProduct"] = $this->Promotion_model->get_type_by_id($req);

		$this->load->view("Add_promotion_view",$data);
	}

	public function update_type(){
		$this->load->model("Promotion_model");
        $sliderID = $this->input->post("sliderID");
		$imagetitle = $this->input->post("imagetitle");
		$imagetitle2 = $this->input->post("imagetitle2");
		$imagedesc = $this->input->post("imagedesc");
		$blog_text = $this->input->post("kt-kontenEditor");
        $disc_amt = $this->input->post("disc_amt");
        $disc_type = $this->input->post("disc_type");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $promo_code = $this->input->post("promo_code");
        $link = $this->input->post("link");
		
		// $userID = $this->session->userdata("userID");
		$active = $this->input->post("active");

		$data = array(
			'title' => $this->security->xss_clean($imagetitle),
			'subtitle' => $this->security->xss_clean($imagetitle2),
            'description' => $this->security->xss_clean($imagedesc),
            'info' => $this->security->xss_clean($blog_text),
            'disc_off' => $this->security->xss_clean($disc_amt),
            'disc_type' => $this->security->xss_clean($disc_type),
            'start_date' => $this->security->xss_clean($start_date),
            'end_date' => $this->security->xss_clean($end_date),
            'promo_code' => $this->security->xss_clean($promo_code),
            'link' => $this->security->xss_clean($link),
			'active' => $active
		);

		if(!empty($_FILES['imagepath']['name'])){
			$config['upload_path'] = './../images/promo/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('imagepath')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$data["image"] = $file['file_name'];
		}
		
		$this->Promotion_model->update($sliderID,$data);
		redirect(site_url("Promotion"));
	}

	public function delete(){
		$this->load->model("Promotion_model");
		$typeID = $this->input->get("typeID");

		$this->Promotion_model->delete($typeID);
		redirect(site_url("Promotion"));
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