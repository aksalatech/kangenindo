<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Blog extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		// if ($this->session->userdata("position") != POSITION_ADMIN) {
		// 	show_404();
		// }
	}

	public function index(){
		$this->load->model("Blog_model");
		
		$data = array();

		$data['blogList'] = $this->Blog_model->get_all_blog();

		$this->load->view("Blog_view",$data);
	}

	public function add_type_view(){
		$this->load->model("Blog_model");

		$data=array();

		$this->load->view("Add_blog_view",$data);
	}

	public function add_type(){
		$this->load->model("Blog_model");

		$msg="";

		$title = $this->input->post("blog_title");
		$subtitle = $this->input->post("blog_subtitle");
		$blog_text = $this->input->post("kt-kontenEditor");
		$id_blogcategory = $this->input->post("blog_kategori");
		$seq_no = $this->Blog_model->get_index();
		$active = $this->input->post("active");

		$dates = date("Y-m-d h:i:s");

		$data = array(
			'title' => strip_tags($title),
			'subtitle' => strip_tags($subtitle),
			'blog_text' => $this->security->xss_clean($blog_text),
			'seq_no' => $seq_no,
			'id_blogcategory' => '1',
			'created_date' => $dates,
			'visible' => $active
		);

		if (!empty($_FILES['image_thumbnail']['name'])) {
			$config['upload_path'] = './../images/blog/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			$config['overwrite'] = true;
		
			$new_file_name = "thumb_" . time();
			$config['file_name'] = $new_file_name;
		
			$this->load->library('upload', $config);
		
			if (!$this->upload->do_upload('image_thumbnail')) {
				echo $this->upload->display_errors();
			} else {
				// Image uploaded successfully, now resize it
				$upload_thumb = $this->upload->data();
		
				// Load the Image Manipulation library
				$this->load->library('image_lib');
		
				// Set the configuration for image resizing
				$config['image_library'] = 'gd';
				$config['source_image'] = $upload_thumb['full_path'];
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 200;
		
				$this->image_lib->initialize($config);
		
				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
				} else {
					// Resize successful, continue with other operations
					$data["thumbnail"] = $new_file_name . $upload_thumb['file_ext'];
				}
		
				// Clear the image library configuration
				$this->image_lib->clear();
			}
		}

		if(!empty($_FILES['image_blog']['name'])){
			$config2['upload_path'] = './../images/blog/';
			$config2['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config2['max_size'] = '4096';
			$config2['overwrite']=true;		
			
			$new_file_name2 = "large_" . time(); 
			$config2['file_name'] = $new_file_name2;

			$this->load->library('upload', $config2, 'upload2');	
			if ( ! $this->upload2->do_upload('image_blog')){
				echo $this->upload2->display_errors();
			}				

			$upload_image = $this->upload2->data();
			$data["image"] = $upload_image['file_name'];
		}

		$this->Blog_model->add($data);
		redirect(site_url("Blog"));

	}

	public function update(){
		$this->load->model("Blog_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["viewProduct"] = $this->Blog_model->get_blog_by_id($req);

		$this->load->view("Add_blog_view",$data);
	}

	public function update_type(){
		$this->load->model("Blog_model");

		$blogID = $this->input->post("blogID");
		$title = $this->input->post("blog_title");
		$subtitle = $this->input->post("blog_subtitle");
		$blog_text = $this->input->post("kt-kontenEditor");
		$id_blogcategory = $this->input->post("blog_kategori");
		// $seq_no = $this->input->post("imageindex");
		$active = $this->input->post("active");

		$dates = date("Y-m-d h:i:s");

		$data = array(
			'title' => strip_tags($title),
			'subtitle' => strip_tags($subtitle),
			'blog_text' => $this->security->xss_clean($blog_text),
			// 'seq_no' => $seq_no,
			'id_blogcategory' => $id_blogcategory,
			'created_date' => $dates,
			'visible' => $active
		);

		if (!empty($_FILES['image_thumbnail']['name'])) {
			$config['upload_path'] = './../images/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			$config['overwrite'] = true;
		
			$new_file_name = "thumb_" . time();
			$config['file_name'] = $new_file_name;
		
			$this->load->library('upload', $config);
		
			if (!$this->upload->do_upload('image_thumbnail')) {
				echo $this->upload->display_errors();
			} else {
				// Image uploaded successfully, now resize it
				$upload_thumb = $this->upload->data();
		
				// Load the Image Manipulation library
				$this->load->library('image_lib');
		
				// Set the configuration for image resizing
				$config['image_library'] = 'gd';
				$config['source_image'] = $upload_thumb['full_path'];
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 200;
		
				$this->image_lib->initialize($config);
		
				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
				} else {
					// Resize successful, continue with other operations
					$data["thumbnail"] = $new_file_name . $upload_thumb['file_ext'];
				}
		
				// Clear the image library configuration
				$this->image_lib->clear();
			}
		}

		if(!empty($_FILES['image_blog']['name'])){
			$config2['upload_path'] = './../images/blog/';
			$config2['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config2['max_size'] = '4096';
			$config2['overwrite']=true;		
			
			$new_file_name2 = "large_" . time(); 
			$config2['file_name'] = $new_file_name2;

			$this->load->library('upload', $config2, 'upload2');	
			if ( ! $this->upload2->do_upload('image_blog')){
				echo $this->upload2->display_errors();
			}				

			$upload_image = $this->upload2->data();
			$data["image"] = $upload_image['file_name'];
		}
		
		$this->Blog_model->update($blogID,$data);
		redirect(site_url("Blog"));
	}

	public function delete(){
		$this->load->model("Blog_model");
		$typeID = $this->input->get("typeID");

		$this->Blog_model->delete($typeID);
		redirect(site_url("Blog"));
	}

	function move_client_up()
	{
			$this->load->model("Blog_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex - 1);

			$query = $this->Blog_model->index_up($clientid, $index);

			echo "";
		
	}

	function move_client_down()
	{
		
			$this->load->model("Blog_model");
			$uriclientid = $this->input->get("ID_customer");
			$clientid = $this->db->escape($uriclientid);

			$uriindex = $this->input->get("index");
			$index = $this->db->escape($uriindex + 1);

			$query = $this->Blog_model->index_down($clientid, $index);

			echo "";
		
	}


}