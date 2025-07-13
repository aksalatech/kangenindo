<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Settings extends Custom_CI_Controller
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
		$this->load->model("Settings_model");
		$this->load->model("Banner_model");
		
		$data = array();

		$config=$this->Settings_model->get_list_config();

		// $bannermenu = $this->Banner_model->get_banner_page('menu');
		// $bannerlocation = $this->Banner_model->get_banner_page('location');
		// $bannerfranchise = $this->Banner_model->get_banner_page('franchise');

		$data['configList']=$config;
		$data['about'] = $this->Settings_model->get_list_about();
		// $data['ketum'] = $this->Settings_model->get_list_about_ketum();
		// $data['fahutan'] = $this->Settings_model->get_list_about_fahutan();
		$data['contact'] = $this->Settings_model->get_list_contact();

		$this->load->view("Settings_view",$data);
	}

	public function update_settings(){
		$this->load->model("Settings_model");
		$title = $this->input->post("title");
		$att_type = $this->input->post("att_type");
		$quote_text = $this->input->post("quote_text");
		$simple_quote = $this->input->post("simple_quote");
		$content = $this->input->post("content");
		$sejarah_singkat = $this->input->post("sejarah_singkat");
		$tujuan = $this->input->post("tujuan");
		$fungsi = $this->input->post("fungsi");
		$azas_text = $this->input->post("azas_text");
		$keanggotaan = $this->input->post("keanggotaan");
		$box1 = $this->input->post("box1");
		$box2 = $this->input->post("box2");
		$box3 = $this->input->post("box3");
		$kebijakan_text = $this->input->post("kebijakantext");

		$name = $this->input->post("name");
		$title_ketum = $this->input->post("title_ketum");
		$simple_quote_ketum = $this->input->post("simple_quote_ketum");
		$content_ketum = $this->input->post("content_ketum");

		$title_sejarah = $this->input->post("title_sejarah");
		$text_sejarah = $this->input->post("text_sejarah");
		$title_program = $this->input->post("title_program");
		$text_program = $this->input->post("text_program");
		$list_sarjana = $this->input->post("list_sarjana");
		$list_magister = $this->input->post("list_magister");
		$list_doktor = $this->input->post("list_doktor");


		$email = $this->input->post("email");
		$email2 = $this->input->post("email2");
		$contactmsg = $this->input->post("contactmsg");
		$mp1 = $this->input->post("mp1");
		$location = $this->input->post("location");
		$whatsapp = $this->input->post("whatsapp");
		$dates = date("Y-m-d h:i:s");
		$langitude = $this->input->post("langitude");
		$latitude = $this->input->post("latitude");

		$dataConfig = array(
			'title' => $this->security->xss_clean($title)
			// 'att_type' => $this->security->xss_clean($att_type)
		);

		if(!empty($_FILES['logo_dark']['name'])){
			$config['upload_path'] = './../images/logo/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('logo_dark')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$dataConfig["logo_dark"] = $file['file_name'];
		}

		if(!empty($_FILES['favicon']['name'])){
			$config['upload_path'] = './../images/logo/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '4096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('favicon')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$dataConfig["favicon"] = $file['file_name'];
		}
		
		$this->Settings_model->update_config($dataConfig);

		if(!empty($_FILES['bannermenu']['name'])){
			$req1='menu';
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('bannermenu')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$dataBanner["imageBanner"] = $file['file_name'];
			$this->Settings_model->update_configbanner($req1,$dataBanner);
		}

		if(!empty($_FILES['bannerfranchise']['name'])){
			$req2='location';
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('bannerfranchise')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$dataBanner["imageBanner"] = $file['file_name'];
			$this->Settings_model->update_configbanner($req2,$dataBanner);
		}

		if(!empty($_FILES['bannerlocation']['name'])){
			$req3='franchise';
			$config['upload_path'] = './../images/banner/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '40096';
			// $config['file_name'] = $codeBranch."_".time();
			$config['overwrite']=true;						
			$this->load->library('upload', $config);	
			if ( ! $this->upload->do_upload('bannerlocation')){
				echo $this->upload->display_errors();
			}				

			$file = $this->upload->data();
			$dataBanner["imageBanner"] = $file['file_name'];
			$this->Settings_model->update_configbanner($req3,$dataBanner);
		}

		

		// $dataAbout = array(
		// 	'quote_text' => $quote_text,
		// 	'simple_quote' => $simple_quote,
		// 	'content' => $content,
		// 	"sejarah_singkat" => $sejarah_singkat,
		// 	"tujuan" => $tujuan,
		// 	"fungsi" => $fungsi,
		// 	"azas_text" => $azas_text,
		// 	"keanggotaan" => $keanggotaan,
		// 	'box1' => $box1,
		// 	'box2' => $box2,
		// 	'box3' => $box3,
		// 	'kebijakan_text' => $kebijakan_text
		// );

		// if(!empty($_FILES['picture']['name'])){
		// 	$config['upload_path'] = './../images/about/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('picture')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$dataAbout["picture"] = $file['file_name'];
		// }

		// if(!empty($_FILES['picture2']['name'])){
		// 	$config['upload_path'] = './../images/about/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('picture2')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$dataAbout["picture2"] = $file['file_name'];
		// }

		// if(!empty($_FILES['picture3']['name'])){
		// 	$config['upload_path'] = './../images/about/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('picture3')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$dataAbout["picture3"] = $file['file_name'];
		// }
		// $this->Settings_model->update_about($dataAbout);

		// $dataAboutKetum = array("name" => $name,
		// 						"title" => $title_ketum,
		// 						"simple_quote" => $simple_quote_ketum,
		// 						"content" => $content_ketum);

		// if(!empty($_FILES['picture_ketum']['name'])){
		// 	$config['upload_path'] = './../images/about/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('picture_ketum')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$dataAboutKetum["picture"] = $file['file_name'];
		// }

		// $this->Settings_model->update_about_ketum($dataAboutKetum);

		// $dataAboutFahutan = array("title_sejarah" => $title_sejarah,
		// 							"text_sejarah" => $text_sejarah,
		// 							"title_program" => $title_program,
		// 							"text_program" => $text_program,
		// 							"list_sarjana" => $list_sarjana,
		// 							"list_magister" => $list_magister,
		// 							"list_doktor" => $list_doktor);

		// if(!empty($_FILES['picture_sejarah']['name'])){
		// 	$config['upload_path'] = './../images/about/';
		// 	$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		// 	$config['max_size'] = '4096';
		// 	// $config['file_name'] = $codeBranch."_".time();
		// 	$config['overwrite']=true;						
		// 	$this->load->library('upload', $config);	
		// 	if ( ! $this->upload->do_upload('picture_sejarah')){
		// 		echo $this->upload->display_errors();
		// 	}				

		// 	$file = $this->upload->data();
		// 	$dataAboutFahutan["picture_sejarah"] = $file['file_name'];
		// }

		// $this->Settings_model->update_about_fahutan($dataAboutFahutan);

		$dataContact = array("email" => $email,
							 "open_hours" => $email2,
							 "contactmsg" => $contactmsg,
							 "mp1" => $mp1,
							 "location" => $location,
							 "whatsapp" => $whatsapp,
							 "langitude" => $langitude,
							 "latitude" => $latitude);
		$this->Settings_model->update_contact($dataContact);


		redirect(site_url("Settings"));
	}

}