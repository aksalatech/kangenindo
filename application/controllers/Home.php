<?php
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->library("encrypt");
		$this->load->helper("form");
		$this->load->database();
	}
	
	function validate($x)
	{
		return $this->db->escape(str_replace("'","`",str_replace('"',"\"",strip_tags(htmlspecialchars($x ?? '')))));
	}
	
	function index()
	{
		$this->load->model("Config_model");	
		$this->load->model("Slider_model");		
		$this->load->model("About_model");
		$this->load->model("Blog_model");
		$this->load->model("Category_model");
		$this->load->model("Image_model");
		$this->load->model("Customer_model"); 
		$this->load->model("Contact_model");
		$this->load->model("Banner_home_model");
		$this->load->model("Banner_promo_model");
		$this->load->model("Testimoni_model");
		$this->load->model("Brand_model");
		
		
		$config=$this->Config_model->get_config();
		$about=$this->About_model->get_about();
		$contact=$this->Contact_model->get_contact();

		$storeLocation = $this->input->get("store");
		
		$data = array();
		$data['error']=0;
		$data['config']=$config;
		$data['about'] = $about;
		$data['contact'] = $contact;
		$data['sliderList'] = $this->Slider_model->get_slider_image();
		$data['blogHomeList'] = $this->Blog_model->get_recentblog();
		$data['categoryList'] = $this->Category_model->get_category();
		// $data['galleryList'] = $this->Image_model->get_visible_image();
		$data['customerList'] = $this->Customer_model->get_customer();
		$data['testimoniList'] = $this->Testimoni_model->get_testimoni();
		$data['bannerPromoList'] = $this->Banner_promo_model->get_full_banner_promo();
		$data['brandList'] = $this->Brand_model->get_active_brand();	
		$data['storeLocation'] = $storeLocation;
		$data['recentProduct']=$this->Image_model->get_recent_image();
		

		$this->load->view("home_view",$data);
	}
	
	/*-------------------------------------------------
	/* Login 
	.*-------------------------------------------------
	*/
	
	public function do_login()
	{
		$this->load->model("user_model");

		$isLogin=$this->session->userdata("id");
		if (!$isLogin)
		{
			//Get Parameter
			$id_admin=$this->input->post("id_admin");
			$password = $this->input->post("password");
			
			$userData=$this->user_model->get_user($this->validate($id_admin));
			
			if (sizeof($userData)>0)
			{
				$check=false;
				foreach($userData as $user):
					if (strcmp($this->encrypt->decode($user->pass),$password)==0)
					{
						if ($user->active==1)
						{
							//Set Session
							$this->session->set_userdata("id",$user->ID_admin);
							$this->session->set_userdata("pass",$user->pass);
							$this->session->set_userdata("name",$user->admin_name);
							$this->session->set_userdata("email",$user->email);
							$this->session->set_userdata("role",$user->role);
							
							echo "0";
						}
						else
							echo "3";
							
						$check=true;
					}
					
				endforeach;
				
				if ($check==false)
					echo "2";
			}
			else
				echo "1";
		}
	}
	
	public function do_forgot()
	{
		$this->load->model("user_model");

		$isLogin=$this->session->userdata("id");
		if (!$isLogin)
		{
			//Get Parameter
			$uriusername=$this->input->post("username");
			$username=$this->validate($uriusername);
			
			$uriemail=$this->input->post("email");
			$email=$this->validate($uriemail);
			
			$pass=$this->user_model->forgot_user($username,$email);
			
			if ($pass!="")
			{
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				//$headers .= 'From: HolidayMood' . "\r\n";
				mail($uriemail,"Change Password HolidayMood","Password HolidayMood, Your Password is <b>".$this->encrypt->decode($pass)."</b>", $headers);
				echo "0";
			}
			else
				echo "1";	
		}
	}
	
	public function do_logout()
	{
		//Unset Session
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('pass');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		
		redirect(base_url());
	}
	
	public function do_change_pass()
	{
		//Get Parameter
		$oldpass=$this->input->post("oldpass");
		$newpass=$this->input->post("newpass");
		$confirmpass=$this->input->post("confirm");
		
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			//Load Model
			$this->load->model("user_model");
		
			if ($oldpass==$this->encrypt->decode($this->session->userdata('pass')))
			{
				if ($newpass==$confirmpass)
				{
					$id_user=$this->session->userdata('id');
					$this->user_model->change_pass($this->db->escape($id_user),$this->db->escape($this->encrypt->encode($newpass)));
					$this->session->set_userdata('pass',$this->encrypt->encode($newpass));
					echo "0";
				}
				else
					echo "2";
			}
			else
				echo "1";
		}
	}

	/*----------------------------------------------------------------
	 * Insert Event
	/*----------------------------------------------------------------
	*/
	function insert_event()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			//Get Parameter
			$urieventname = $this->input->get("name");
			$eventname = $this->validate($urieventname);
			
			$urieventdesc = $this->input->get("desc");
			$eventdesc = $this->validate($urieventdesc);
			
			$urivisible=$this->input->get("visible");
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/gallery/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}

			//Set data to array
			$dataToInsert = array(
								"events_name" => $eventname,
								"events_img" => $picture,
								"events_desc" => $eventdesc,
								"visible" => $visible
							);
		
			$this->event_model->insert_event($dataToInsert);
			
			echo "";
		}
	}

	function update_event_picture()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$uriid=$this->input->get("id");
			$id=$this->validate($uriid);
			
			// $urifilename=$this->input->get("path");
	
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/gallery/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"ID_events"=>$id,
								"events_img"=>$picture
							 );
							
			$query=$this->event_model->update_event_picture($dataToEdit);
			// unlink("image/plan/".$urifilename);
			
			echo "";
		}
	}

	function edit_event()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$urieventid=$this->input->post("id");
			$eventid=$this->validate($urieventid);
			
			$urieventname = $this->input->post("name");
			$eventname = $this->validate($urieventname);
			
			$urieventdesc = $this->input->post("desc");
			$eventdesc = $this->validate($urieventdesc);
			
			$urivisible=$this->input->post("visible");
			$visible=$this->validate($urivisible);
			
			$dataToEdit=array(
								"ID_events" => $eventid,
								"events_name" => $eventname,
								"events_desc" => $eventdesc,
								"visible" => $visible
							);
							
			$query=$this->event_model->update_event($dataToEdit);
			
			echo "";
		}
	}

	function retrieve_front_event()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$eventsList=$this->event_model->get_visible_event();
			$detailImageList=$this->event_model->get_full_image();
			
			$super=array();
			$sub=array();
			$prev="";
			$curr="";
			foreach($detailImageList as $detailImage):
				if ($prev=="") $prev=$curr;
				$curr=$detailImage->ID_events;
				if ($prev!=$curr)
				{
					$super[$prev]=json_encode($sub);
					$sub=array();
					array_push($sub,$detailImage);
					$prev=$curr;
				}
				else
				{
					array_push($sub,$detailImage);
				}			
			endforeach;
			$super[$curr]=json_encode($sub);
			
			$event_image_list=$super;
			
			echo json_encode($eventsList)."<-sp->".json_encode($event_image_list);
		}
	}

	function retrieve_event()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$eventList=$this->event_model->get_all_event();
			
			echo json_encode($eventList);
		}
	}

	function retrieve_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");
			
			$serviceList=$this->service_model->get_all_service();
			
			echo json_encode($serviceList);
		}
	}
	
	function retrieve_event_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$uriid=$this->input->get("id");
			$id=$this->db->escape($uriid);
			
			$imageList=$this->event_model->get_all_image($id);
			
			echo json_encode($imageList);
		}
	}
	
	function insert_evt_img()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$urieventid=$this->input->get("id");
			$eventid=$this->validate($urieventid);
			
			$urititle=$this->input->get("title");
			$title=$this->validate($urititle);
					
			$uridesc=$this->input->get("desc");
			$desc=$this->validate($uridesc);
					
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/gallery/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"ID_events"=>$eventid,
									"imagePath"=>$picture,
									"imageTitle"=>$title,
									"imageDesc"=>$desc,
									"visible"=>$visible
								);
								
			$query=$this->event_model->insert_image($dataToInsert);
			
			echo "";
		}
	}
	
	function update_event_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$uridetailid=$this->input->get("id");
			$detailid=$this->validate($uridetailid);
			
			$urifilename=$this->input->get("path");
	
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/gallery/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"detailID"=>$detailid,
								"imagePath"=>$picture
							 );
							
			$query=$this->event_model->update_event_image($dataToEdit);
			unlink("assets/events/".$urifilename);
			
			echo "";
		}
	}
	
	function update_event_image_title_desc()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$uridetailid=$this->input->post("id");
			$detailid=$this->validate($uridetailid);
			
			$urititle=$this->input->post("title");
			$title=$this->validate($urititle);
			
			$uridesc=$this->input->post("desc");
			$desc=$this->validate($uridesc);
			
			$dataToEdit=array(
								"detailID" => $detailid,
								"imageTitle" => $title,
								"imageDesc" => $desc
							);
							
			$query=$this->event_model->update_image_title_desc($dataToEdit);
			
			echo "";
		}
	}
	
	
	function move_event_image_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			$uridetailid=$this->input->get("id");
			$detailid=$this->db->escape($uridetailid);
			
			$urieventid=$this->input->get("id_evt");
			$eventid=$this->db->escape($urieventid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->event_model->index_image_up($detailid,$eventid,$index);
			
			echo "";
		}
	}
	
	function move_event_image_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			$uridetailid=$this->input->get("id");
			$detailid=$this->db->escape($uridetailid);

			$urieventid=$this->input->get("id_evt");
			$eventid=$this->db->escape($urieventid);
							
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->event_model->index_image_down($detailid,$eventid,$index);
			
			echo "";
		}
	}
	
	function delete_event_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$id_detail=$this->db->escape($this->input->get("id"));
			$urifilename=$this->input->get("path");
			
			$this->event_model->delete_event_image($id_detail);
			unlink("assets/events/".$urifilename);
			
			echo "";
		}
	}

	/*-------------------------------------------------
	/* Manage Layanan
	.*-------------------------------------------------
	*/

	function insert_layanan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			//Get Parameter		
			$urilayananpict = $this->input->post("pict");
			$layananpict = $this->validate($urilayananpict);

			$urilayanantitle = $this->input->post("title");
			$layanantitle = $this->validate($urilayanantitle);
			
			$urilayanantext = $this->input->post("text");
			$layanantext = $this->validate($urilayanantext);

			$urivisible=(isset($_POST["visible"]))?$this->input->post("visible"):"0";
			$visible=$this->validate($urivisible);
			
			//Set data to array
			$dataToInsert = array(
								"layanan_pict" => $layananpict,
								"layanan_title" => $layanantitle,
								"layanan_text" => $layanantext,
								"visible" => $visible
							);
		
			$this->event_model->insert_layanan($dataToInsert);
			
			echo "";
		}
	}

	function edit_layanan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$urilayananid=$this->input->post("id");
			$layananid=$this->validate($urilayananid);

			$urilayananpict = $this->input->post("pict");
			$layananpict = $this->validate($urilayananpict);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$uritext=$this->input->post("text");
			$text= $this->validate($uritext);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"layananID"=>$layananid,
								"pict" => $layananpict,
								"name"=>$name,
								"text" => $text,
								"visible" => $visible
							);
							
			$query=$this->event_model->update_layanan($dataToEdit);
			
			echo "";
		}
	}

	/*-------------------------------------------------
	/* Manage Service
	.*-------------------------------------------------
	*/

	function insert_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");
			
			//Get Parameter		
			$uriservicepict = $this->input->post("pict");
			$servicepict = $this->validate($uriservicepict);

			$uriservicetitle = $this->input->post("title");
			$servicetitle = $this->validate($uriservicetitle);
			
			$uriservicetext = $this->input->post("text");
			$servicetext = $this->validate($uriservicetext);

			$urivisible=(isset($_POST["visible"]))?$this->input->post("visible"):"0";
			$visible=$this->validate($urivisible);
			
			//Set data to array
			$dataToInsert = array(
								"service_pict" => $servicepict,
								"service_title" => $servicetitle,
								"service_text" => $servicetext,
								"visible" => $visible
							);
		
			$this->service_model->insert_service($dataToInsert);
			
			echo "";
		}
	}

	function edit_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");
			
			$uriserviceid=$this->input->post("id");
			$serviceid=$this->validate($uriserviceid);

			$uriservicepict = $this->input->post("pict");
			$servicepict = $this->validate($uriservicepict);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$uritext=$this->input->post("text");
			$text= $this->validate($uritext);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"serviceID"=>$serviceid,
								"pict" => $servicepict,
								"name"=>$name,
								"text" => $text,
								"visible" => $visible
							);
							
			$query=$this->service_model->update_service($dataToEdit);
			
			echo "";
		}
	}

	
	/*-------------------------------------------------
	/* Manage Clients
	.*-------------------------------------------------
	*/

	function insert_client()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			
			$uriname=$this->input->get("name");
			$name=$this->validate($uriname);
				
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".png";
				file_put_contents("images/sponsors/logos/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"brand_path"=>$picture,
									"brand_name"=>$name,
									"is_active"=>$visible
								);
								
			$query=$this->customer_model->insert_client($dataToInsert);
			echo "0";
		}
	}

	function retrieve_client()
	{
		$this->load->model("customer_model");
		
		$clientList=$this->customer_model->get_full_client();
		
		echo json_encode($clientList);
	}

	function delete_client()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			
			$uriclientid=$this->input->get("id");
			$clientid=$this->validate($uriclientid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->customer_model->delete_client($clientid);
			unlink("image/logos/".$urifilename);
			
			echo "";
		}
	}

	function edit_client()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			
			$uriclientid=$this->input->post("id");
			$clientid=$this->validate($uriclientid);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"ID_customer"=>$clientid,
								"brand_name"=>$name,
								"is_active" => $visible
							);
							
			$query=$this->customer_model->update_client($dataToEdit);
			
			echo "";
		}
	}

	function move_client_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			$uriclientid=$this->input->get("ID_customer");
			$clientid=$this->db->escape($uriclientid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->customer_model->index_up($clientid,$index);
			
			echo "";
		}
	}
	
	function move_client_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			$uriclientid=$this->input->get("ID_customer");
			$clientid=$this->db->escape($uriclientid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->customer_model->index_down($clientid,$index);
			
			echo "";
		}
	}
	
	function update_client_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("customer_model");
			
			$uriclientid=$this->input->get("id");
			$clientid=$this->validate($uriclientid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".png";
				file_put_contents("images/sponsors/logos/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_customer"=>$clientid,
								"brand_path"=>$picture
							);
							
			$query=$this->customer_model->update_image($dataToEdit);
			
			echo "";
		}
	}
	
	/*-------------------------------------------------
	/* Booking
	.*-------------------------------------------------
	*/

	function retrieve_booking()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("booking_model");
			
			$bookingList=$this->booking_model->get_booking();
			
			echo json_encode($bookingList);
		}
	}

	public function update_book_status()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("booking_model");
			
			//Get Parameter
			$uriid =$this->input->post("id");
			$id = $this->validate($uriid);
			
			$uristatus = $this->input->post("status");
			$status=$this->validate($uristatus);
			
			//Insert into Database
			$query = $this->booking_model->update_status($status, $id);
			
			echo "";
		}
	}

	public function booking()
	{
		$this->load->model("booking_model");
		$this->load->model("contact_model");
		$this->load->model("category_model");

		//Get Parameter
		$uriplaces=$this->input->post("places");
		$places = $this->validate($uriplaces);
		
		$uridate = $this->input->post("date");
		$date=$this->validate(date('Y-m-d', strtotime($uridate)));
		
		$uricategory = $this->input->post("category");
		$category=$this->validate($uricategory);
		
		$uriname=$this->input->post("name");
		$name = $this->validate($uriname);
		
		$uriphone = $this->input->post("phone");
		$phone = $this->validate($uriphone);

		$uriemail = $this->input->post("email");
		$email = $this->validate($uriemail);

		$urinotes = $this->input->post("notes");
		$notes = $this->validate($urinotes);
		
		//Set data to array
		$dataToInsert  = array
		(
			"places" => $places,
			"book_date"=> $date,
			"categoryID"=> $category,
			"contact_name" => $name,
			"contact_phone" => $phone,
			"contact_email" => $email,
			"notes" => $notes 
		);
		//Insert into Database
		$query = $this->booking_model->insert_booking($dataToInsert);
		
		// Mengirim email
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$contact = $this->contact_model->get_contact();
		$mail=mail(
					$contact->email,
					"Booking on HolidayMood by ".$uriname,
					"Dear Admin HolidayMood, <br/><br/>
					I want to book a photographer, we want to have trip at ".$uriplaces." on ".date('d M Y', $uridate).". 
					The themes of  our photograph is ".$this->category_model->get_category_by_id($category).". <br/>
					Please contact us immediately once our booking request is approved on my email, ".$uriemail." or on my phone (".$uriphone."). <br/><br/>

					NB : ".$urinotes."<br/><br/><br/>

					Best Regards,<br/>
					".$uriname,$headers);

		if ($contact->email2 != "") {
			$mail=mail(
						$contact->email2,
						"Booking on HolidayMood by ".$uriname,
						"Dear Admin HolidayMood, <br/><br/>
						I want to book a photographer, we want to have trip at ".$uriplaces." on ".date('d M Y', $uridate).". 
						The themes of  our photograph is ".$this->category_model->get_category_by_id($category).". <br/>
						Please contact us immediately once our booking request is approved on my email, ".$uriemail." or on my phone (".$uriphone."). <br/><br/>

						NB : ".$urinotes."<br/><br/><br/>

						Best Regards,<br/>
						".$uriname,$headers);
		}

		echo "";
	}


	/*-------------------------------------------------
	/* admin
	.*-------------------------------------------------
	*/
	public function insert_admin()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("user_model");
			
			//Get Parameter
			$uriusername =$this->input->post("username");
			$username = $this->validate($uriusername);
			
			$uriname = $this->input->post("name");
			$name=$this->validate($uriname);
			
			$uriemail = $this->input->post("email");
			$email=$this->validate($uriemail);

			$urirole = $this->input->post("role");
			$role=$this->validate($urirole);
			
			$uripassword=$this->input->post("password");
			$password = $this->validate($this->encrypt->encode($uripassword));
			
			$uriactive = $this->input->post("visible");
			$active = $this->validate($uriactive);
			
			//Set data to array
			$dataToInsert  = array
			(
				"ID_admin" => $username,
				"admin_name"=> $name,
				"email"=> $email,
				"role"=> $role,
				"pass" => $password,
				"active" => $active 
			);
			//Insert into Database
			$query = $this->user_model->insert_user($dataToInsert);
			
			echo $role;
		}
	}
	
	public function edit_admin()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("user_model");
			
			//Get Parameter
			$uriusername =$this->input->post("username");
			$username = $this->validate($uriusername);
			
			$uriname = $this->input->post("name");
			$name=$this->validate($uriname);
			
			$uriemail = $this->input->post("email");
			$email=$this->validate($uriemail);

			$urirole = $this->input->post("role");
			$role=$this->validate($urirole);
			
			$uriactive = $this->input->post("visible");
			$active = $this->validate($uriactive);
			
			//Set data to array
			$dataToEdit = array
			(
				"ID_admin" => $username,
				"admin_name"=> $name,
				"email"=> $email,
				"role" => $role,
				"active" => $active 
			);
			//Insert into Database
			$query = $this->user_model->update_user($dataToEdit);
			
			echo "";
		}
	}
	
	public function remove_admin()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("user_model");
			
			//Get Parameter
			$uriadminid =$this->input->get("id");
			$adminid = $this->validate($uriadminid);
			
			//Insert into Database
			$query = $this->user_model->delete_user($adminid);
			
			echo "";
		}
	}

	/*-------------------------------------------------
	/* Store
	.*-------------------------------------------------
	*/
	public function insert_store()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("official_store_model");
			
			//Get Parameter
			$uriname =$this->input->post("name");
			$name = $this->validate($uriname);
			
			$uricity = $this->input->post("city");
			$city=$this->validate($uricity);
			
			$uriaddress = $this->input->post("address");
			$address=$this->validate($uriaddress);

			$uriphone = $this->input->post("phone");
			$phone=$this->validate($uriphone);
			
			$urihours = $this->input->post("hours");
			$hours = $this->validate($urihours);

			$uriembed = $this->input->post("embed");
			$embed = $this->validate($uriembed);

			$uridirections = $this->input->post("directions");
			$directions = $this->validate($uridirections);
			
			
			//Set data to array
			$dataToInsert  = array
			(
				"name" => $name,
				"city"=> $city,
				"address"=> $address,
				"phone"=> $phone,
				"hours" => $hours,
				"embed" => $embed,
				"directions" => $directions
			);
			//Insert into Database
			$query = $this->official_store_model->insert_store($dataToInsert);
			
			echo "<script>alert('test');</script>";
		}
	}
	
	public function edit_store()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("official_store_model");
			
			//Get Parameter
			$uriid =$this->input->post("id");
			$id = $this->validate($uriid);

			$uriname =$this->input->post("name");
			$name = $this->validate($uriname);
			
			$uricity = $this->input->post("city");
			$city=$this->validate($uricity);
			
			$uriaddress = $this->input->post("address");
			$address=$this->validate($uriaddress);

			$uriphone = $this->input->post("phone");
			$phone=$this->validate($uriphone);
			
			$urihours = $this->input->post("hours");
			$hours = $this->validate($urihours);

			$uriembed = $this->input->post("embed");
			$embed = $this->validate($uriembed);

			$uridirections = $this->input->post("directions");
			$directions = $this->validate($uridirections);
			
			//Set data to array
			$dataToEdit = array
			(
				"id" => $id,
				"name" => $name,
				"city"=> $city,
				"address"=> $address,
				"phone"=> $phone,
				"hours" => $hours,
				"embed" => $embed,
				"directions" => $directions
			);
			//Insert into Database
			$query = $this->official_store_model->update_store($dataToEdit);
			
			echo "";
		}
	}
	
	public function remove_store()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("official_store_model");
			
			//Get Parameter
			$uriid =$this->input->get("id");
			$id = $this->validate($uriid);
			
			//Insert into Database
			$query = $this->official_store_model->delete_store($id);
			
			echo "";
		}
	}

	public function retrieve_store()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("official_store_model");
			
			$storeList=$this->official_store_model->get_official_store();
			
			echo json_encode($storeList);
		}
	}


	public function remove_how()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			
			//Get Parameter
			$urihowid =$this->input->get("id");
			$howid = $this->validate($urihowid);
			
			//Insert into Database
			$query = $this->how_model->delete_how($howid);
			
			echo "";
		}
	}

	public function remove_layanan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			//Get Parameter
			$urilayananid =$this->input->get("id");
			$layananid = $this->validate($urilayananid);
			
			//Insert into Database
			$query = $this->event_model->delete_layanan($layananid);
			
			echo "";
		}
	}

	public function remove_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");
			
			//Get Parameter
			$uriserviceid =$this->input->get("id");
			$serviceid = $this->validate($uriserviceid);
			
			//Insert into Database
			$query = $this->service_model->delete_service($serviceid);
			
			echo "";
		}
	}

	public function remove_why()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			
			//Get Parameter
			$uriwhyid =$this->input->get("id");
			$whyid = $this->validate($uriwhyid);
			
			//Insert into Database
			$query = $this->why_model->delete_why($whyid);
			
			echo "";
		}
	}

	public function remove_category()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			
			//Get Parameter
			$uricategoryid =$this->input->get("id");
			$categoryid = $this->validate($uricategoryid);
			
			//Insert into Database
			$query = $this->category_model->delete_category($categoryid);
			
			echo "";
		}
	}

	public function remove_blogcategory()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			
			//Get Parameter
			$uriblogcategoryid =$this->input->get("id");
			$blogcategoryid = $this->validate($uriblogcategoryid);
			
			//Insert into Database
			$query = $this->blogcategory_model->delete_category($blogcategoryid);
			
			echo "";
		}
	}

	public function remove_tags()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			
			//Get Parameter
			$uritagsid =$this->input->get("id");
			$tagsid = $this->validate($uritagsid);
			
			//Insert into Database
			$query = $this->blogtags_model->delete_category($tagsid);
			
			echo "";
		}
	}

	public function remove_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			//Get Parameter
			$uriplanid =$this->input->get("id");
			$planid = $this->validate($uriplanid);
			
			//Insert into Database
			$query = $this->plan_model->delete_plan($planid);
			
			echo "";
		}
	}
	
	public function retrieve_admin()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("user_model");
			
			$adminList=$this->user_model->get_full_user();
			
			echo json_encode($adminList);
		}
	}
	
	/*-------------------------------------------------
	/* Logo
	.*-------------------------------------------------
	*/
	
	public function do_change_logo()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "headlogo.png";
				file_put_contents("assets/headlogo/".$filename,$str);
				
				echo "";				
			}
		}
	}
	
	
	public function do_change_web_logo()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "favicon.png";
				file_put_contents("image/".$filename,$str);
				
				echo "";				
			}
		}
	}

	public function do_change_wallpaper()
	{
		$this->load->model("config_model");

		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".mp4";
				file_put_contents("images/home/".$filename,$str);
				
				$dataToEdit=array( "video_link"=>$filename );
				
				$result=$this->config_model->update_video($dataToEdit);
					
				echo $filename;				
			}
		}
	}

	public function do_change_wallpaper2()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "wallpaper2.jpg";
				file_put_contents("image/full/".$filename,$str);
				
				echo "";				
			}
		}
	}

	/*-------------------------------------------------
	/* Social
	.*-------------------------------------------------
	*/
	function update_social()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
			
			//Get Parameter
			$urifacebook=$this->input->post('facebook');
			$facebook=$this->validate($urifacebook);
			
			$uritwitter=$this->input->post('twitter');
			$twitter=$this->validate($uritwitter);

			$urilinkedin=$this->input->post('linkedin');
			$linkedin=$this->validate($urilinkedin);

			$urigoogle=$this->input->post('google');
			$google=$this->validate($urigoogle);
			
			$dataToEdit=array(
							"facebook_link"=>$facebook,
							"twitter_link"=>$twitter,
							"linkedin_link" => $linkedin,
							"google_link" => $google
						);
			
			$result=$this->config_model->update_social($dataToEdit);
			
			echo $content;
		}
	}

	function update_olshop()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
			
			//Get Parameter
			$urishopee=$this->input->post('shopee');
			$shopee=$this->validate($urishopee);
			
			$uritokopedia=$this->input->post('tokopedia');
			$tokopedia=$this->validate($uritokopedia);

			$uritiktok=$this->input->post('tiktok');
			$tiktok=$this->validate($uritiktok);

			$urialfamart=$this->input->post('alfamart');
			$alfamart=$this->validate($urialfamart);

			$uriindomaret=$this->input->post('indomaret');
			$indomaret=$this->validate($uriindomaret);

			$uriaeon=$this->input->post('aeon');
			$aeon=$this->validate($uriaeon);

			$uriastro=$this->input->post('astro');
			$astro=$this->validate($uriastro);

			$urikkv=$this->input->post('kkv');
			$kkv=$this->validate($urikkv);
			
			$dataToEdit=array(
							"shopee"=>$shopee,
							"tokopedia"=>$tokopedia,
							"alfamart"=>$alfamart,
							"indomaret"=>$indomaret,
							"aeon"=>$aeon,
							"tiktok" => $tiktok,
							"astro" => $astro,
							"kkv" => $kkv
						);
			
			$result=$this->config_model->update_olshop($dataToEdit);
			
			echo $content;
		}
	}


	function update_bloglink()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
			
			//Get Parameter
			$urilink=$this->input->post('link');
			$link=$this->validate($urilink);
			
			$dataToEdit=array(
							"blog_link"=>$link
						);
			
			$result=$this->config_model->update_bloglink($dataToEdit);
			
			echo $content;
		}
	}
	

	/*-------------------------------------------------
	/* Video 
	.*-------------------------------------------------
	*/
	function update_video()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
			
			//Get Parameter
			$urilink=$this->input->post('link');
			$link=$this->validate($urilink);
			
			$uritext=$this->input->post('text');
			$text=$this->validate($uritext);
			
			$dataToEdit=array(
							"video_link"=>$link,
							"video_text"=>$text
						);
			
			$result=$this->config_model->update_video($dataToEdit);
			
			echo $content;
		}
	}
	

	/*-------------------------------------------------
	/* About 
	.*-------------------------------------------------
	*/
	function update_about()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter			
			$uricontent=$this->input->post('content');
			$content=$this->validate($uricontent);

			$uriquote=$this->input->post('quote');
			$quote=$this->validate($uriquote);
			
			$dataToEdit=array(
							"quote_text"=>$quote,
							// "simple_quote"=>$simple,
							"content"=>$content
							// "content2"=>$content2
						);
			
			$result=$this->about_model->update_about($dataToEdit);
			
			echo $content;
		}
	}

	function update_roder()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder_model");
			
			//Get Parameter			
			$urititle=$this->input->post('title');
			$title=$this->validate($urititle);

			$urisubtitle=$this->input->post('subtitle');
			$subtitle=$this->validate($urisubtitle);

			$urispec_title=$this->input->post('spec_title');
			$spec_title=$this->validate($urispec_title);

			$urispec_desc=$this->input->post('spec_desc');
			$spec_desc=$this->validate($urispec_desc);
			
			$dataToEdit=array(
							"title"=>$title,
							"subtitle"=>$subtitle,
							"spec_title"=>$spec_title,
							"spec_desc"=>$spec_desc
						);
			
			$result=$this->roder_model->update_roder($dataToEdit);
			
			echo $content;
		}
	}

	function update_about1()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter
			$uriquote=$this->input->post('quote');
			$quote=$this->validate($uriquote);
			
			$urisimple=$this->input->post('simple');
			$simple=$this->validate($urisimple);
			
			$dataToEdit=array(
							"quote_text"=>$quote,
							"simple_quote"=>$simple
						);
			
			$result=$this->about_model->update_about1($dataToEdit);
			
			echo $content;
		}
	}

	function update_about2()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter
			$uribox1=$this->input->post('box1');
			$box1=$this->validate($uribox1);

			$uribox2=$this->input->post('box2');
			$box2=$this->validate($uribox2);

			$uribox3=$this->input->post('box3');
			$box3=$this->validate($uribox3);

			$uribox4=$this->input->post('box4');
			$box4=$this->validate($uribox4);
			
			$dataToEdit=array(
							"box1"=>$box1,
							"box2"=>$box2,
							"box3"=>$box3,
							"box4"=>$box4
						);
			
			$result=$this->about_model->update_about2($dataToEdit);
			
			echo $content;
		}
	}

	function update_about_quote()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter
			$uriquote=$this->input->post('quote');
			$quote=$this->validate($uriquote);
			
			$uricontent=$this->input->post('content');
			$content=$this->validate($uricontent);

			$urititle1=$this->input->post('title1');
			$title1=$this->validate($urititle1);

			$urisubtitle1=$this->input->post('subtitle1');
			$subtitle1=$this->validate($urisubtitle1);

			$urititle2=$this->input->post('title2');
			$title2=$this->validate($urititle2);

			$urisubtitle2=$this->input->post('subtitle2');
			$subtitle2=$this->validate($urisubtitle2);
			
			$dataToEdit=array(
							"quote_text"=>$quote,
							"content"=>$content,
							"title1" => $title1,
							"subtitle1" => $subtitle1,
							"title2" => $title2,
							"subtitle2" => $subtitle2
						);
			
			$result=$this->about_model->update_about_quote($dataToEdit);
			
		}
	}

	function update_about_title()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter
			$urititle1=$this->input->post('title1');
			$title1=$this->validate($urititle1);

			$urititle2=$this->input->post('title2');
			$title2=$this->validate($urititle2);
			
			$urititle3=$this->input->post('title3');
			$title3=$this->validate($urititle3);

			$urititle4=$this->input->post('title4');
			$title4=$this->validate($urititle4);

			$urititle5=$this->input->post('title5');
			$title5=$this->validate($urititle5);

			$urititle6=$this->input->post('title6');
			$title6=$this->validate($urititle6);

			$urisubtitle1=$this->input->post('subtitle1');
			$subtitle1=$this->validate($urisubtitle1);

			$dataToEdit=array(
							"title1"=>$title1,
							"title2" => $title2,
							"title3" => $title3,
							"title4" => $title4,
							"title5" => $title5,
							"title6" => $title6,
							"subtitle1" => $subtitle1
						);
			
			$result=$this->about_model->update_about_title($dataToEdit);
			
			echo $content;
		}
	}

	function update_about_home()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			//Get Parameter
			$uriquote=$this->input->post('quote');
			$quote=$this->validate($uriquote);
			
			$uricontent=$this->input->post('content');
			$content=$this->validate($uricontent);

			$urivisi=$this->input->post('visi');
			$visi=$this->validate($urivisi);
			
			$urimisi=$this->input->post('misi');
			$misi=$this->validate($urimisi);
			
			
			$dataToEdit=array(
							"quote_text"=>$quote,
							"content"=>$content,
							"visi"=>$visi,
							"misi"=>$misi
						);
			
			$result=$this->about_model->update_about_home($dataToEdit);
			
			echo $content;
		}
	}

	/*-------------------------------------------------
	/* Fact 
	.*-------------------------------------------------
	*/
	function insert_fact()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			$uriname=$this->input->get("name");
			$name=$this->validate($uriname);

			$urisub=$this->input->get("subtitle");
			$sub=$this->validate($urisub);
				
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".png";
				file_put_contents("images/sponsors/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"bg_pict"=>$picture,
									"fact_name"=>$name,
									"subtitle"=>$sub,
									"is_active"=>$visible
								);
								
			$query=$this->fact_model->insert_fact($dataToInsert);
			echo "0";
		}
	}

	function update_fact()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			//Get Parameter
			$uriaward=$this->input->post('award');
			$award=$this->validate($uriaward);
			
			$uriclient=$this->input->post('client');
			$client=$this->validate($uriclient);
			
			$uriproject=$this->input->post('project');
			$project=$this->validate($uriproject);

			$uriteam=$this->input->post('team');
			$team=$this->validate($uriteam);
			
			$dataToEdit=array(
							"awards"=>$award,
							"client"=>$client,
							"project"=>$project,
							"team" => $team
						);
			
			$result=$this->fact_model->update_fact($dataToEdit);
			
			echo $result;
		}
	}

	function edit_fact()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			$urifactid=$this->input->post("id");
			$factid=$this->validate($urifactid);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$urisub=$this->input->post("subtitle");
			$sub=$this->validate($urisub);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"ID_fact"=>$factid,
								"fact_name"=>$name,
								"subtitle"=>$sub,
								"is_active" => $visible
							);
							
			$query=$this->fact_model->update_fact_name($dataToEdit);
			
			echo "";
		}
	}

	function delete_fact()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			$urifactid=$this->input->get("id");
			$factid=$this->validate($urifactid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->fact_model->delete_fact($factid);
			unlink("images/clients-downloads/".$urifilename);
			
			echo "";
		}
	}

	function retrieve_fact()
	{
		$this->load->model("fact_model");
		
		$factList=$this->fact_model->get_full_fact();
		
		echo json_encode($factList);
	}

	function update_fact_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			$urifactid=$this->input->get("id");
			$factid=$this->validate($urifactid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".png";
				file_put_contents("images/sponsors/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_fact"=>$factid,
								"bg_pict"=>$picture
							);
							
			$query=$this->fact_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function move_fact_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");
			
			$urifactid=$this->input->get("ID_fact");
			$factid=$this->db->escape($urifactid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->fact_model->index_up($factid,$index);
			
			echo "";
		}
	}
	
	function move_fact_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("fact_model");

			$urifactid=$this->input->get("ID_fact");
			$factid=$this->db->escape($urifactid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->fact_model->index_down($factid,$index);
			
			echo "";
		}
	}


	/*----------------------------------------------------------------
	 * Insert How
	/*----------------------------------------------------------------
	*/
	function insert_testimoni()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			
			//Get Parameter
			$uriperson_name = $this->input->get("person_name");
			$person_name = $this->validate($uriperson_name);
			
			$uricorp_name = $this->input->get("corp_name");
			$corp_name = $this->validate($uricorp_name);
			
			$uritestimoni_text = $this->input->get("testimoni_text");
			$testimoni_text = $this->validate($uritestimoni_text);

			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/testimonials/".$filename,$str);
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			//Set data to array
			$dataToInsert = array(
								"person_name" => $person_name,
								"corporation_name" => $corp_name,
								"testimoni_text" => $testimoni_text,
								"person_photo" => $picture
							);
		
			$this->testimoni_model->insert_testimoni($dataToInsert);
			
			echo "";
		}
	}

	function update_testimoni_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/testimonials/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_testimoni"=>$imageid,
								"person_photo"=>$picture
							);
							
			$query=$this->testimoni_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function update_detail_news_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_slider_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/blog/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_slider"=>$imageid,
								"imagePath"=>$picture
							);
							
			$query=$this->blog_slider_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function edit_testimoni()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			
			//Get Parameter
			$uritestimoniid = $this->input->post("id");
			$testimoniid = $this->validate($uritestimoniid);

			$uriperson_name = $this->input->post("person_name");
			$person_name = $this->validate($uriperson_name);
			
			$uricorp_name = $this->input->post("corp_name");
			$corp_name = $this->validate($uricorp_name);
			
			$uritestimoni_text = $this->input->post("testimoni_text");
			$testimoni_text = $this->validate($uritestimoni_text);
			
			//Set data to array
			$dataToEdit = array(
								"ID_testimoni" => $testimoniid,
								"person_name" => $person_name,
								"corporation_name" => $corp_name,
								"testimoni_text" => $testimoni_text
							);
		
			$this->testimoni_model->update_testimoni($dataToEdit);
			
			echo "";
		}
	}

	function retrieve_testimoni()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			
			$testimoniList=$this->testimoni_model->get_testimoni();
			
			echo json_encode($testimoniList);
		}
	}

	public function remove_testimoni()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			
			//Get Parameter
			$uritestimoniid =$this->input->get("id");
			$testimoniid = $this->validate($uritestimoniid);
			
			//Insert into Database
			$query = $this->testimoni_model->delete_testimoni($testimoniid);
			
			echo "";
		}
	}

	function move_testimoni_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			$uritestimoniid=$this->input->get("ID_testimoni");
			$testimoniid=$this->db->escape($uritestimoniid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->testimoni_model->index_up($testimoniid,$index);
			
			echo "";
		}
	}
	
	function move_testimoni_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("testimoni_model");
			$uritestimoniid=$this->input->get("ID_testimoni");
			$testimoniid=$this->db->escape($uritestimoniid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->testimoni_model->index_down($testimoniid,$index);
			
			echo "";
		}
	}
	
	function move_team_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
			$uriteamid=$this->input->get("ID_team");
			$teamid=$this->db->escape($uriteamid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->team_model->index_up($teamid,$index);
			
			echo "";
		}
	}
	
	function move_team_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
			$uriteamid=$this->input->get("ID_team");
			$teamid=$this->db->escape($uriteamid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->team_model->index_down($teamid,$index);
			
			echo "";
		}
	}



	/*----------------------------------------------------------------
	 * Insert How
	/*----------------------------------------------------------------
	*/
	function insert_how()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			
			//Get Parameter		
			$urihowpict = $this->input->post("pict");
			$howpict = $this->validate($urihowpict);

			$urihowtitle = $this->input->post("title");
			$howtitle = $this->validate($urihowtitle);

			$urihowsubtitle = $this->input->post("subtitle");
			$howsubtitle = $this->validate($urihowsubtitle);
			
			$urihowtext = $this->input->post("text");
			$howtext = $this->validate($urihowtext);

			// $urihowurl = $this->input->get("url");
			// $howurl = $this->validate($urihowurl);
			
			//Set data to array
			$dataToInsert = array(
								"how_pict" => $howpict,
								"how_title" => $howtitle,
								"how_text" => $howtext,
								"how_subtitle" => $howsubtitle
							);
		
			$this->how_model->insert_how($dataToInsert);
			
			echo "";
		}
	}


	function edit_how()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			
			//Get Parameter
			$urihowpict = $this->input->post("pict");
			$howpict = $this->validate($urihowpict);

			$urihowid = $this->input->post("id");
			$howid = $this->validate($urihowid);
			
			$urihowtitle = $this->input->post("title");
			$howtitle = $this->validate($urihowtitle);

			$urihowsubtitle = $this->input->post("subtitle");
			$howsubtitle = $this->validate($urihowsubtitle);
			
			$urihowtext = $this->input->post("text");
			$howtext = $this->validate($urihowtext);
			
			//Set data to array
			$dataToEdit = array(
								"ID_hows" => $howid,
								"how_title" => $howtitle,
								"how_text" => $howtext,
								"how_subtitle" => $howsubtitle,
								"how_pict" => $howpict
							);
		
			$this->how_model->update_how($dataToEdit);
			
			echo "";
		}
	}

	/*----------------------------------------------------------------
	 * Insert Category
	/*----------------------------------------------------------------
	*/
	function insert_category()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			
			//Get Parameter
			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);
			
			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);
			
			//Set data to array
			$dataToInsert = array(
								"category_code" => $code,
								"category_name" => $name,
								"is_active" => $is_active,
							);
		
			$this->category_model->insert_category($dataToInsert);
			
			echo "";
		}
	}

	function edit_category()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			
			//Get Parameter
			$uriid = $this->input->post("id");
			$id = $this->validate($uriid);

			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);

			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);

			//Set data to array
			$dataToEdit = array(
								"ID_category" => $id,
								"category_code" => $code,
								"category_name" => $name,
								"is_active" => $is_active
								);
		
			$this->category_model->update_category($dataToEdit);
			
			echo "";
		}
	}

	/*----------------------------------------------------------------
	 * Insert Blog Category
	/*----------------------------------------------------------------
	*/
	function insert_blogcategory()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			
			//Get Parameter
			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);
			
			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);
			
			//Set data to array
			$dataToInsert = array(
								"blogcategory_code" => $code,
								"blogcategory_name" => $name,
								"is_active" => $is_active,
							);
		
			$this->blogcategory_model->insert_category($dataToInsert);
			
			echo "";
		}
	}

	function edit_blogcategory()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			
			//Get Parameter
			$uriid = $this->input->post("id");
			$id = $this->validate($uriid);

			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);

			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);

			//Set data to array
			$dataToEdit = array(
								"ID_blogcategory" => $id,
								"blogcategory_code" => $code,
								"blogcategory_name" => $name,
								"is_active" => $is_active
								);
		
			$this->blogcategory_model->update_category($dataToEdit);
			
			echo "";
		}
	}

	/*----------------------------------------------------------------
	 * Insert Blog Tags
	/*----------------------------------------------------------------
	*/
	function insert_blogtags()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			
			//Get Parameter
			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);
			
			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);
			
			//Set data to array
			$dataToInsert = array(
								"tags_code" => $code,
								"tags_name" => $name,
								"is_active" => $is_active,
							);
		
			$this->blogtags_model->insert_category($dataToInsert);
			
			echo "";
		}
	}

	function edit_blogtags()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			
			//Get Parameter
			$uriid = $this->input->post("id");
			$id = $this->validate($uriid);

			$uricode = $this->input->post("code");
			$code = $this->validate($uricode);

			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);

			$uriis_active = $this->input->post("is_active");
			$is_active = $this->validate($uriis_active);

			//Set data to array
			$dataToEdit = array(
								"ID_tags" => $id,
								"tags_code" => $code,
								"tags_name" => $name,
								"is_active" => $is_active
								);
		
			$this->blogtags_model->update_category($dataToEdit);
			
			echo "";
		}
	}


	/*----------------------------------------------------------------
	 * Insert Why
	/*----------------------------------------------------------------
	*/
	function insert_why()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			
			//Get Parameter
			// $uriwhypict = $this->input->post("pict");
			// $whypict = $this->validate($uriwhypict);
			
			$uriwhyside = $this->input->post("side");
			$whyside = $this->validate($uriwhyside);

			$uriwhytitle = $this->input->post("title");
			$whytitle = $this->validate($uriwhytitle);
			
			$uriwhytext = $this->input->post("text");
			$whytext = $this->validate($uriwhytext);

			$picture = ""; // Inisialisasi variabel picture

			// Check if image file is uploaded
			if (!empty($_FILES['image']['name'])) {
				$filename = md5(time().uniqid()).".png";
				move_uploaded_file($_FILES['image']['tmp_name'], "images/why/".$filename);
				$picture = $this->db->escape($filename);
			}

			//Set data to array
			$dataToInsert = array(
								"why_pict" => $picture,
								"why_side" => $whyside,
								"why_title" => $whytitle,
								"why_text" => $whytext
							);
		
			$this->why_model->insert_why($dataToInsert);
			
			echo "";
		}
	}


	function edit_why()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			
			//Get Parameter
			$uriwhyid = $this->input->post("id");
			$whyid = $this->validate($uriwhyid);

			$uriwhyside = $this->input->post("side");
			$whyside = $this->validate($uriwhyside);

			$uriwhypict = $this->input->post("pict");
			$whypict = $this->validate($uriwhypict);
			
			$uriwhytitle = $this->input->post("title");
			$whytitle = $this->validate($uriwhytitle);
			
			$uriwhytext = $this->input->post("text");
			$whytext = $this->validate($uriwhytext);
			
			//Set data to array
			$dataToEdit = array(
								"ID_why" => $whyid,
								"why_side" => $whyside,
								"why_pict" => $whypict,
								"why_title" => $whytitle,
								"why_text" => $whytext
							);
		
			$this->why_model->update_why($dataToEdit);
			
			echo "";
		}
	}


	/*----------------------------------------------------------------
	 * Insert Plan
	/*----------------------------------------------------------------
	*/
	function insert_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			//Get Parameter
			$uriplanname = $this->input->get("name");
			$planname = $this->validate($uriplanname);

			$urisubtitle = $this->input->get("subtitle");
			$subtitle = $this->validate($urisubtitle);
			
			$urispec = $this->input->get("spec");
			$spec = $this->validate($urispec);
			
			$uridesc = $this->input->get("desc");
			$desc = $this->validate($uridesc);

			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/plan/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			//Set data to array
			$dataToInsert = array(
								"plan_name" => $planname,
								"plan_image" => $picture,
								"subtitle" => $subtitle,
								"spec" => $spec,
								"desc" => $desc
							);
		
			$this->plan_model->insert_plan($dataToInsert);
			
			echo "";
		}
	}

	function insert_detail_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			//Get Parameter
			$uriplanid = $this->input->get("id");
			$planid = $this->validate($uriplanid);

			$uridetailtext = $this->input->get("detail_text");
			$detailtext = "'".$uridetailtext."'";
			
			$uridetailkat = $this->input->get("detail_kat");
			$detailkat = "'".$uridetailkat."'";

			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/plan/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}

			//Set data to array
			$dataToInsert = array(
								"id_plan" => $planid,
								"detail_text" => $detailtext,
								"detailkat" => $detailkat,
								"imagePath" => $picture
							);
		
			$this->plan_model->insert_plan_detail($dataToInsert);

			echo "";
		}
	}

	
	function edit_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			//Get Parameter
			$uriplanid = $this->input->post("id");
			$planid = $this->validate($uriplanid);

			$uriplanname = $this->input->post("name");
			$planname = $this->validate($uriplanname);

			$urisubtitle = $this->input->post("subtitle");
			$subtitle = $this->validate($urisubtitle);
			
			$urispec = $this->input->post("spec");
			$spec = $this->validate($urispec);
			
			$uridesc = $this->input->post("desc");
			$desc = $this->validate($uridesc);
			
			//Set data to array
			$dataToEdit = array(
								"ID_plan" => $planid,
								"plan_name" => $planname,
								"subtitle" => $subtitle,
								"spec" => $spec,
								"desc" => $desc
							);
		
			$this->plan_model->update_plan($dataToEdit);
			
			echo "";
		}
	}

	function update_plan_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			$uriid=$this->input->get("id");
			$id=$this->validate($uriid);
			
			// $urifilename=$this->input->get("path");
	
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/plan/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"ID_plan"=>$id,
								"plan_image"=>$picture
							 );
							
			$query=$this->plan_model->update_plan_image($dataToEdit);
			// unlink("image/plan/".$urifilename);
			
			echo "";
		}
	}

	/*----------------------------------------------------------------
	 * Insert Blog
	/*----------------------------------------------------------------
	*/

	function insert_blog()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
						
			$urititle=$this->input->get("title");
			$title=$this->validate($urititle);

			$urisubtitle=$this->input->get("subtitle");
			$subtitle=$this->validate($urisubtitle);
					
			$urilink=$this->input->get("link");
			$link=$this->validate($urilink);

			$urishopee=$this->input->get("shopee");
			$shopee=$this->validate($urishopee);

			$uritokopedia=$this->input->get("tokopedia");
			$tokopedia=$this->validate($uritokopedia);

			$urilazada=$this->input->get("lazada");
			$lazada=$this->validate($urilazada);

			$uricategory=$this->input->get("category");
			$category=$this->validate($uricategory);

			$uricreator=$this->input->get("creator");
			$creator=$this->validate($uricreator);

			$urivisible=$this->input->get("visible");
			$visible=$this->validate($urivisible);

			$uritext=$this->input->get("blogText");
			$text="'".$uritext."'";
					
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/blog/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"image"=>$picture,
									"title"=>$title,
									"subtitle"=>$subtitle,
									"link"=>$link,
									"shopee"=>$shopee,
									"tokopedia"=>$tokopedia,
									"lazada"=>$lazada,
									"category"=> $category,
									"blog_text" => $text,
									"creator"=>$creator,
									"visible"=>$visible
								);
								
			$query=$this->blog_model->insert_blog($dataToInsert);
			
			echo "";
		}
	}

	function insert_detail_news()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_slider_model");

			$uriblogid=$this->input->get("ID_blog");
			$blogid=$this->validate($uriblogid);
					
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/blog/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"image"=>$picture,
									"ID_blog"=>$blogid
								);
								
			$query=$this->blog_slider_model->insert_blog($dataToInsert);
			
			echo "";
		}
	}

	function insert_newslettervisit()
	{

			$this->load->model("newsletter_model");
			
			//Get Parameter
			$urimail = $this->input->post("email");
			$email = $this->validate($urimail);
			//Set data to array
			$dataToInsert = array(
								"contact_email" => $email,
							);
		
			$this->newsletter_model->insert_newslettervisit($dataToInsert);
	}

	function insert_newsletter()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");
			
			//Get Parameter
			$uriemail = $this->input->post("contact_email");
			$email_name = $this->validate($uriemail);
						
			$urivisible = $this->input->post("visible");
			$visible = $this->validate($urivisible);
			
			//Set data to array
			$dataToInsert = array(
								"contact_email" => $email_name,
								"visible" => $visible
							);
		
			$this->newsletter_model->insert_newsletter($dataToInsert);
			
			echo "";
		}
	}


	function edit_newsletter()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");
			
			//Get Parameter
			$urinewsletterid = $this->input->post("id");
			$newsletterid = $this->validate($urinewsletterid);

			$uriemail = $this->input->post("contact_email");
			$email = $this->validate($uriemail);

			$urivisible = $this->input->post("visible");
			$visible = $this->validate($urivisible);
			
			//Set data to array
			$dataToEdit = array(
								"ID_newsletter" => $newsletterid,
								"contact_email" => $email,
								"visible" => $visible
							);
		
			$this->newsletter_model->update_newsletter($dataToEdit);
			
			echo "";
		}
	}

	function retrieve_newsletter()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");
			
			$newsletterList=$this->newsletter_model->get_newsletter();
			
			echo json_encode($newsletterList);
		}
	}

	public function remove_newsletter()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");

			//Get Parameter
			$urinewsletterid =$this->input->get("id");
			$newsletterid = $this->validate($urinewsletterid);

			//Insert into Database
			$query = $this->newsletter_model->delete_newsletter($newsletterid);

			echo "";
		}
	}

	function move_newsletter_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");
			$urinewsletterid=$this->input->get("ID_newsletter");
			$newsletterid=$this->db->escape($urinewsletterid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->newsletter_model->index_up($newsletterid,$index);
			
			echo "";
		}
	}
	
	function move_newsletter_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("newsletter_model");
			$urinewsletterid=$this->input->get("ID_newsletter");
			$newsletterid=$this->db->escape($urinewsletterid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->newsletter_model->index_down($newsletterid,$index);
			
			echo "";
		}
	}

	function insert_team()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
						
			$uriname=$this->input->get("name");
			$name=$this->validate($uriname);
					
			$uriposition=$this->input->get("position");
			$position=$this->validate($uriposition);

			$urifb=$this->input->get("fb");
			$fb=$this->validate($urifb);

			$uritwitter=$this->input->get("twitter");
			$twitter=$this->validate($uritwitter);

			$urilinkedin=$this->input->get("linkedin");
			$linkedin=$this->validate($urilinkedin);
					
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/team/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"photo_path"=>$picture,
									"name"=>$name,
									"position_name"=>$position,
									"facebook_link"=>$fb,
									"twitter_link"=>$twitter,
									"linkedin_link" => $linkedin
								);
								
			$query=$this->team_model->insert_team($dataToInsert);
			
			echo "";
		}
	}
	
	/*---------------------------------------------------------------------
	/*Right Picture
	/*---------------------------------------------------------------------
	*/
	
	function update_right_pic()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/about/".$filename,$str);
				
				$picture=$this->db->escape($filename);
							
				$query=$this->about_model->update_pic($picture);
			}
			echo "";
		}
	}

	function update_pakar_pic()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/about/".$filename,$str);
				
				$picture=$this->db->escape($filename);
							
				$query=$this->about_model->update_pakar_pic($picture);
			}
			echo "";
		}
	}
	
	function update_contact()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("contact_model");
			
			$uriemail=$this->input->post("email");
			$email=$this->validate($uriemail);

			$uriemail2=$this->input->post("email2");
			$email2 = $this->validate($uriemail2);
			
			$uriphone=$this->input->post("phone");
			$phone=$this->validate($uriphone);

			$uriwa=$this->input->post("wa");
			$wa=$this->validate($uriwa);
			
			$uriaddress=$this->input->post("address");
			$address=$this->validate($uriaddress);

			$uriofficeHours=$this->input->post("officeHours");
			$officeHours=$this->validate($uriofficeHours);
			
			$dataToEdit=array(
							  "email"=>$email,
							  "email2" => $email2,
							  "mp1"=>$phone,
							  "wa"=>$wa,
							  "location"=>$address,
							  "officeHours"=>$officeHours
							);
			$query=$this->contact_model->update_contact($dataToEdit);
			echo "";
		}
	}

	function update_intro()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("intro_model");
			
			$uricontent=$this->input->post("content");
			$content="'".$uricontent."'";

			$dataToEdit=array(
							  "content"=>$content
							);
			$query=$this->intro_model->update_contact($dataToEdit);
			echo "";
		}
	}

	function update_location()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("contact_model");
			
			$urilangitude=$this->input->post("langitude");
			$langitude=$this->validate($urilangitude);
			
			$urilatitude=$this->input->post("latitude");
			$latitude=$this->validate($urilatitude);
			
			$dataToEdit=array(
							  "langitude"=>$langitude,
							  "latitude"=>$latitude,
							);
			$query=$this->contact_model->update_location($dataToEdit);
			echo "";
		}
	}

	function update_contactmsg()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("contact_model");
			
			$uricontact=$this->input->post("contact");
			$contact=$this->validate($uricontact);
			
			$dataToEdit=array(
							  "contactMsg"=>$contact,
							);
			$query=$this->contact_model->update_contactmsg($dataToEdit);
			echo "";
		}
	}

	public function retrieve_detail_plan()
	{
		$this->load->model("plan_model");

		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$uriplanid = $this->input->get("planid");
			$planid = $this->validate($uriplanid);

			$planDetailList = $this->plan_model->get_plan_detail_by_id2($uriplanid);
			
			echo json_encode($planDetailList);
		}
	}

	public function retrieve_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			$planList=$this->plan_model->get_plan();
			$planDetailList = $this->plan_model->get_plan_detail();
			
			$planData = array();
			foreach ($planList as $plan) :
				if (isset($planDetailList[$plan->ID_plan])) {
					$plan->detail = $planDetailList[$plan->ID_plan];
				}
				array_push($planData, $plan);
			endforeach;

			echo json_encode($planData);
		}
	}
	
	function retrieve_how()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			
			$howList=$this->how_model->get_how();
			
			echo json_encode($howList);
		}
	}

	function retrieve_why()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			
			$whyList=$this->why_model->get_why();
			
			echo json_encode($whyList);
		}
	}

	function retrieve_category()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			
			$categoryList=$this->category_model->get_full_category();
			
			echo json_encode($categoryList);
		}
	}

	function retrieve_blogcategory()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			
			$blogcategoryList=$this->blogcategory_model->get_full_category();
			
			echo json_encode($blogcategoryList);
		}
	}

	function retrieve_blogtags()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			
			$blogtagsList=$this->blogtags_model->get_full_category();
			
			echo json_encode($blogtagsList);
		}
	}
	
	function edit_news()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
			
			$uriblogid=$this->input->post("id");
			$blogid=$this->validate($uriblogid);
			
			$urititle = $this->input->post("title");
			$title = $this->validate($urititle);

			$urisubtitle = $this->input->post("subtitle");
			$subtitle = $this->validate($urisubtitle);
			
			$urilink = $this->input->post("link");
			$link = $this->validate($urilink);

			$urishopee = $this->input->post("shopee");
			$shopee = $this->validate($urishopee);

			$uritokopedia = $this->input->post("tokopedia");
			$tokopedia = $this->validate($uritokopedia);

			$urilazada = $this->input->post("lazada");
			$lazada = $this->validate($urilazada);

			$uricategory = $this->input->post("category");
			$category = $this->validate($uricategory);
			
			$uricreator = $this->input->post("creator");
			$creator = $this->validate($uricreator);
			
			$urivisible=$this->input->post("visible");
			$visible=$this->validate($urivisible);

			$uritext=$this->input->post("blogText");
			$text="'".$uritext."'";
			
			$dataToEdit=array(
								"ID_blog" => $blogid,
								"title" => $title,
								"subtitle" => $subtitle,
								"link" => $link,
								"category" => $category,
								"blog_text" => $text,
								"creator" => $creator,
								"shopee" => $shopee,
								"tokopedia" => $tokopedia,
								"lazada" => $lazada,
								"visible" => $visible
							);
							
			$query=$this->blog_model->update_blog($dataToEdit);
			
			echo "";
		}
	}

	function edit_team()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
			
			$uriteamid=$this->input->post("id");
			$teamid=$this->validate($uriteamid);
			
			$uriname = $this->input->post("name");
			$name = $this->validate($uriname);
			
			$uriposition = $this->input->post("position");
			$position = $this->validate($uriposition);
			
			$urifb = $this->input->post("fb");
			$fb = $this->validate($urifb);
			
			$uritwitter=$this->input->post("twitter");
			$twitter=$this->validate($uritwitter);

			$urilinkedin=$this->input->post("linkedin");
			$linkedin=$this->validate($urilinkedin);
			
			$dataToEdit=array(
								"ID_team" => $teamid,
								"name" => $name,
								"position_name" => $position,
								"facebook_link" => $fb,
								"twitter_link" => $twitter,
								"linkedin_link" => $linkedin
							);
							
			$query=$this->team_model->update_team($dataToEdit);
			
			echo "";
		}
	}

	function edit_portfolio()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uriimageid=$this->input->post("id");
			$imageid=$this->validate($uriimageid);
			
			$urititle = $this->input->post("title");
			$title = $this->validate($urititle);
			
			$uricategory = $this->input->post("category");
			$category = $this->validate($uricategory);
			
			$uridesc = $this->input->post("desc");
			$desc = $this->validate($uridesc);

			$urivisible = $this->input->post("visible");
			$visible = $this->validate($urivisible);
			
			$dataToEdit=array(
								"imageID" => $imageid,
								"imageTitle" => $title,
								"ID_category" => $category,
								"imageDesc" => $desc,
								"visible" => $visible
							);
							
			$query=$this->image_model->update_title_desc($dataToEdit);
			
			echo "";
		}
	}

	function edit_detail_portfolio()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uridetailid=$this->input->post("id");
			$detailid=$this->validate($uridetailid);
			
			$urititle = $this->input->post("title");
			$title = $this->validate($urititle);
			
			$uriimageid = $this->input->post("image");
			$imageid = $this->validate($uriimageid);
			
			$uridesc = $this->input->post("desc");
			$desc = $this->validate($uridesc);

			$urivisible = $this->input->post("visible");
			$visible = $this->validate($urivisible);
			
			$dataToEdit=array(
								"detailID" => $detailid,
								"imageTitle" => $title,
								"imageDesc" => $desc,
								"visible" => $visible
							);
							
			$query=$this->image_model->update_detail_title_desc($dataToEdit);
			
			echo "";
		}
	}
	
	function delete_event()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$id_event=$this->db->escape($this->input->get("id_event"));
			$this->event_model->delete_event($id_event);
			
			echo "";
		}
	}
	
	function move_event_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			$urieventid=$this->input->get("id");
			$eventid=$this->db->escape($urieventid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->event_model->index_up($eventid,$index);
			
			echo "";
		}
	}
	
	function move_event_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			$urieventid=$this->input->get("id");
			$eventid=$this->db->escape($urieventid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->event_model->index_down($eventid,$index);
			
			echo "";
		}
	}
	
	function retrieve_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$imageList=$this->image_model->get_full_image();
			
			echo json_encode($imageList);
		}
	}

	function retrieve_full_detail_image()
	{
		$isLogin=$this->session->userdata("id");
		$this->load->model("image_model");

		$uriimageid = $this->input->get("imageid");
		$imageid = $this->validate($uriimageid);

		$imageList=$this->image_model->get_full_detail_image($imageid);
		
		echo json_encode($imageList);
	}

	function retrieve_detail_image()
	{
		$isLogin=$this->session->userdata("id");
		$this->load->model("image_model");

		$uriimageid = $this->input->get("imageid");
		$imageid = $this->validate($uriimageid);

		$imageList=$this->image_model->get_visible_detail_image($imageid);
		
		echo json_encode($imageList);
	}
	
	function retrieve_front_image()
	{
		$this->load->model("image_model");
		
		$imageList=$this->image_model->get_visible_image();
		$imgList=array();
		foreach ($imageList as $image):
			$img['path']=$image->imagePath;
			$img['title']=$image->imageTitle;
			$img['desc']=$image->imageDesc;
			array_push($imgList,(object)$img);
		endforeach;
		
		$max_per_page=19;
		if (sizeof($imgList)==0)
			$check_point=19;
		else
			$check_point=ceil(sizeof($imgList)/$max_per_page)*$max_per_page;
		
		for ($i=sizeof($imgList);$i<$check_point;$i++)
		{
			$img['path']="gray.jpg";
			$img['title']="";
			$img['desc']="";
			array_push($imgList,(object)$img);
		}
		
		echo json_encode($imgList);
	}
	
	function update_img()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uriimageid=$this->input->post("id");
			$imageid=$this->validate($uriimageid);
			
			$urititle=$this->input->post("title");
			$title=$this->validate($urititle);
			
			$uridesc=$this->input->post("desc");
			$desc=$this->validate($uridesc);
			
			$urivisible=$this->input->post("visible");
			$visible=$this->validate($urivisible);
			
			$dataToEdit=array(
								"imageID" => $imageid,
								"imageTitle" => $title,
								"imageDesc" => $desc,
								"visible"=>$visible
							);
							
			$query=$this->image_model->update_title_desc($dataToEdit);
			
			echo "";
		}
	}
	
	
	function insert_img()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$urititle=$this->input->get("title");
			$title=$this->validate($urititle);

			$uricategory = $this->input->get("category");
			$category = $this->validate($uricategory);
					
			$uridesc=$this->input->get("desc");
			$desc=$this->validate($uridesc);
			
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/works/large/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"imagePath"=>$picture,
									"imageTitle"=>$title,
									"ID_category" => $category,
									"imageDesc"=>$desc,
									"visible"=>$visible
								);
								
			$query=$this->image_model->insert_image($dataToInsert);
			
			echo "";
		}
	}

	function insert_detail_img()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$urititle=$this->input->get("title");
			$title=$this->validate($urititle);

			$uriimageid = $this->input->get("image");
			$imageid = $this->validate($uriimageid);
					
			$uridesc=$this->input->get("desc");
			$desc=$this->validate($uridesc);
			
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				echo $filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/works/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"imagePath"=>$picture,
									"imageTitle"=>$title,
									"imageID" => $imageid,
									"imageDesc"=>$desc,
									"visible"=>$visible
								);
								
			$query=$this->image_model->insert_detail_image($dataToInsert);
			
			echo "";
		}
	}
	
	function update_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
	
			$str = file_get_contents('php://input');
			if ($str!="") {
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/works/thumb/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"imageID"=>$imageid,
								"imagePath"=>$picture
							 );
							
			$query=$this->image_model->update_image($dataToEdit);
			
			echo $filename;
		}
	}

	function update_detail_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uridetailid=$this->input->get("id");
			$detailid=$this->validate($uridetailid);
	
			$str = file_get_contents('php://input');
			if ($str!="") {
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/works/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"detailID"=>$detailid,
								"imagePath"=>$picture
							 );
							
			$query=$this->image_model->update_detail_image($dataToEdit);
			
			echo $filename;
		}
	}

	function update_thumb_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{	
			$filename = $this->input->get("name");
			move_uploaded_file($_FILES['croppedImage']['tmp_name'], "images/works/thumb/".$filename);
			
			echo "";
		}
	}
	
	function update_why_pict()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
				
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/mockup/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
										
			$query=$this->config_model->update_why_pict($picture);
			
			echo $filename;
		}
	}

	function update_about_pict()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
				
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".mp4";
				file_put_contents("images/video/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
										
			$query=$this->about_model->update_about_pict($picture);
			
			echo $filename;
		}
	}

	function update_pic_home()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("about_model");
				
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
										
			$query=$this->about_model->update_pic_home($picture);
			
			echo $filename;
		}
	}

	function update_blog_banner()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");

			$uriblogid=$this->input->get("id");
			$blogid=$this->validate($uriblogid);
				
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/blog/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";

			$dataToEdit=array(
				"ID_blog"=>$blogid,
				"banner"=>$picture
				);
										
			$query=$this->blog_model->update_blog_banner($dataToEdit);
			
			echo $filename;
		}
	}

	function update_team_photo()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
			
			$uriteamid=$this->input->get("id");
			$teamid=$this->validate($uriteamid);
	
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/team/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture="";
			
			$dataToEdit=array(
								"ID_team"=>$teamid,
								"photo_path"=>$picture
							 );
							
			$query=$this->team_model->update_photo($dataToEdit);
			
			echo "";
		}
	}

	function delete_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uriimageid=$this->input->get("imageid");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->image_model->delete_image($imageid);
			unlink("assets/image/".$urifilename);
			
			echo "";
		}
	}

	function delete_detail_portfolio()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uridetailid=$this->input->get("id");
			$detailid=$this->validate($uridetailid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->image_model->delete_detail_image($detailid);
			unlink("image/portfolio/large/".$urifilename);
			unlink("image/portfolio/thumb/".$urifilename);
			
			echo "";
		}
	}
	
	
	function insert_slider()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			
			$uriname=$this->input->get("name");
			$name=$this->validate($uriname);

			$uricontent=$this->input->get("content");
			$content="'".$uricontent."'";
				
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/slide/slides/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			
			$dataToInsert=array(	
									"imagePath"=>$picture,
									"imageTitle"=>$name,
									"content" => $content,
									"visible"=>$visible
								);
								
			$query=$this->slider_model->insert_image($dataToInsert);
			echo "0";
		}
	}

	function insert_slider_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");
			
			$uriname=$this->input->get("name");
			$name=$this->validate($uriname);

			$uricontent=$this->input->get("content");
			$content="'".$uricontent."'";

			$urilink=$this->input->get("link");
			$link=$this->validate($urilink);
				
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			$str = file_get_contents('php://input');
			// if ($str!="")
			// {
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/services-carousel/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			// }
			
			$dataToInsert=array(	
									"imagePath"=>$picture,
									"imageTitle"=>$name,
									"content" => $content,
									"visible"=>$visible,
									"link"=>$link
								);
								
			$query=$this->sliderservice_model->insert_image($dataToInsert);
			echo "0";
		}
	}

	function insert_opsi_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder_model");
			
			$urititle=$this->input->get("title");
			$title=$this->validate($urititle);

			$urisubtitle=$this->input->get("subtitle");
			$subtitle=$this->validate($urisubtitle);
				
			$urivisible=(isset($_GET["visible"]))?$this->input->get("visible"):"0";
			$visible=$this->validate($urivisible);
			
			// $str = file_get_contents('php://input');
			// if ($str!="")
			// {
			// 	$filename = md5(time().uniqid()).".jpg";
			// 	file_put_contents("images/roder/".$filename,$str);
				
			// 	$picture=$this->db->escape($filename);			
			// }
			
			$dataToInsert=array(	
									"title"=>$title,
									"subtitle"=>$subtitle,
									"visible"=>$visible
								);
								
			$query=$this->roder_model->insert_opsi($dataToInsert);
			echo "0";
		}
	}
	
	function move_how_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			$urihowid=$this->input->get("howid");
			$howid=$this->db->escape($urihowid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->how_model->index_up($howid,$index);
			
			echo "";
		}
	}
	
	function move_how_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			$urihowid=$this->input->get("howid");
			$howid=$this->db->escape($urihowid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->how_model->index_down($howid,$index);
			
			echo "";
		}
	}

	function move_why_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			$uriwhyid=$this->input->get("whyid");
			$whyid=$this->db->escape($uriwhyid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->why_model->index_up($whyid,$index);
			
			echo "";
		}
	}
	
	function move_why_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("why_model");
			$uriwhyid=$this->input->get("whyid");
			$whyid=$this->db->escape($uriwhyid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->why_model->index_down($whyid,$index);
			
			echo "";
		}
	}

	function move_category_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			$uricategoryid=$this->input->get("categoryid");
			$categoryid=$this->db->escape($uricategoryid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->category_model->index_up($categoryid,$index);
			
			echo "";
		}
	}
	
	function move_category_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("category_model");
			$uricategoryid=$this->input->get("categoryid");
			$categoryid=$this->db->escape($uricategoryid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->category_model->index_down($categoryid,$index);
			
			echo "";
		}
	}

	function move_blogcategory_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			$uriblogcategoryid=$this->input->get("blogcategoryid");
			$blogcategoryid=$this->db->escape($uriblogcategoryid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->blogcategory_model->index_up($blogcategoryid,$index);
			
			echo "";
		}
	}
	
	function move_blogcategory_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogcategory_model");
			$uriblogcategoryid=$this->input->get("blogcategoryid");
			$blogcategoryid=$this->db->escape($uriblogcategoryid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->blogcategory_model->index_down($blogcategoryid,$index);
			
			echo "";
		}
	}

	function move_tags_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			$uritagsid=$this->input->get("tagsid");
			$tagsid=$this->db->escape($uritagsid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->blogtags_model->index_up($tagsid,$index);
			
			echo "";
		}
	}
	
	function move_tags_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blogtags_model");
			$uritagsid=$this->input->get("tagsid");
			$tagsid=$this->db->escape($uritagsid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->blogtags_model->index_down($tagsid,$index);
			
			echo "";
		}
	}


	function move_plan_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			$uriplanid=$this->input->get("planid");
			$planid=$this->db->escape($uriplanid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->plan_model->index_up($planid,$index);
			
			echo "";
		}
	}
	
	function move_plan_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			$uriplanid=$this->input->get("planid");
			$planid=$this->db->escape($uriplanid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->plan_model->index_down($planid,$index);
			
			echo "";
		}
	}

	function move_detail_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			$uridetailid=$this->input->get("detailid");
			$detailid=$this->db->escape($uridetailid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->plan_model->index_detail_up($detailid,$index);
			
			echo "";
		}
	}
	
	function move_detail_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			$uridetailid=$this->input->get("detailid");
			$detailid=$this->db->escape($uridetailid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->plan_model->index_detail_down($detailid,$index);
			
			echo "";
		}
	}

	function move_img_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			$uriimageid=$this->input->get("imageid");
			$imageid=$this->db->escape($uriimageid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->image_model->index_up($imageid,$index);
			
			echo "";
		}
	}
	
	function move_img_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			$uriimageid=$this->input->get("imageid");
			$imageid=$this->db->escape($uriimageid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->image_model->index_down($imageid,$index);
			
			echo "";
		}
	}


	function move_det_img_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			$uridetailid=$this->input->get("detailid");
			$detailid=$this->db->escape($uridetailid);
				
			$uriimageid=$this->input->get("imageid");
			$imageid=$this->db->escape($uriimageid);

			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->image_model->index_detail_up($detailid,$imageid,$index);
			
			echo "";
		}
	}
	
	function move_det_img_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			$uridetailid=$this->input->get("detailid");
			$detailid=$this->db->escape($uridetailid);
				
			$uriimageid=$this->input->get("imageid");
			$imageid=$this->db->escape($uriimageid);

			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->image_model->index_detail_down($detailid,$imageid,$index);
			
			echo "";
		}
	}
	
	function retrieve_slider()
	{
		$this->load->model("slider_model");
		
		$sliderList=$this->slider_model->get_full_image();
		
		echo json_encode($sliderList);
	}

	function retrieve_slider_service()
	{
		$this->load->model("sliderservice_model");
		
		$sliderList=$this->sliderservice_model->get_full_image();
		
		echo json_encode($sliderList);
	}

	function retrieve_opsi_service()
	{
		$this->load->model("roder_model");
		
		$opsiList=$this->roder_model->get_full_opsi();
		
		echo json_encode($opsiList);
	}

	function retrieve_front_slider()
	{
		$this->load->model("slider_model");
		
		$sliderList=$this->slider_model->get_visible_image();
		
		echo json_encode($sliderList);
	}
	
	function delete_slider()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->slider_model->delete_image($imageid);
			unlink("images/slide/slides/".$urifilename);
			
			echo "";
		}
	}

	function delete_slider_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->sliderservice_model->delete_image($imageid);
			unlink("images/services-carousel/".$urifilename);
			
			echo "";
		}
	}

	function delete_kanvasing()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("kanvasing_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->kanvasing_model->delete_image($imageid);
			unlink("images/services-carousel/".$urifilename);
			
			echo "";
		}
	}

	function delete_opsi_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->roder_model->delete_image_opsi($imageid);
			unlink("images/roder/".$urifilename);
			
			echo "";
		}
	}

	function delete_layanan_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$urilayananid=$this->input->get("id");
			$layananid=$this->validate($urilayananid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->event_model->delete_image($imageid);
			// unlink("images/services-carousel/".$urifilename);
			
			echo "";
		}
	}

	function delete_news()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
			
			$uriblogid=$this->input->get("id");
			$blogid=$this->validate($uriblogid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->blog_model->delete_blog($blogid);
			unlink("image/blog/".$urifilename);
			
			echo "";
		}
	}

	function delete_detail_news()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_slider_model");
			
			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->validate($urisliderid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->blog_slider_model->delete_blog($sliderid);
			unlink("image/blog/".$urifilename);
			
			echo "";
		}
	}

	function delete_team()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("team_model");
			
			$uriteamid=$this->input->get("id");
			$teamid=$this->validate($uriteamid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->team_model->delete_team($teamid);
			unlink("image/team/".$urifilename);
			
			echo "";
		}
	}

	function delete_portfolio()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("image_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$urifilename=$this->input->get("filename");
			$filename=$this->validate($urifilename);
			
			$this->image_model->delete_image($imageid);
			unlink("image/portfolio/thumb/".$urifilename);
			unlink("image/portfolio/large/".$urifilename);
			
			echo "";
		}
	}

	function delete_detail_plan()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("plan_model");
			
			$uridetailid=$this->input->get("id");
			$detailid=$this->validate($uridetailid);
			
			$this->plan_model->delete_detail_plan($detailid);
			
			echo "";
		}
	}
	
	function edit_home()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			
			$urihomeid=$this->input->post("id");
			$homeid=$this->validate($urihomeid);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$uricontent=$this->input->post("content");
			$content= "'".$uricontent."'";

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"imageID"=>$homeid,
								"imageTitle"=>$name,
								"content" => urldecode($content),
								"visible" => $visible
							);
							
			$query=$this->slider_model->update_slider($dataToEdit);
			
			echo "";
		}
	}

	function move_home_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->slider_model->index_up($sliderid,$index);
			
			echo "";
		}
	}
	
	function move_home_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->slider_model->index_down($sliderid,$index);
			
			echo "";
		}
	}

	function move_news_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
			$uriblogid=$this->input->get("ID_blog");
			$blogid=$this->db->escape($uriblogid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->blog_model->index_up($blogid,$index);
			
			echo "";
		}
	}
	
	function move_news_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
			$uriblogid=$this->input->get("ID_blog");
			$blogid=$this->db->escape($uriblogid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->blog_model->index_down($blogid,$index);
			
			echo "";
		}
	}

	function move_news_detail_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_slider_model");

			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->blog_slider_model->index_up($sliderid,$index);
			
			echo "";
		}
	}
	
	function move_news_detail_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_slider_model");

			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->blog_slider_model->index_down($blogid,$index);
			
			echo "";
		}
	}

	function edit_opsi_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder_model");
			
			$urihomeid=$this->input->post("id");
			$homeid=$this->validate($urihomeid);
			
			$urititle=$this->input->post("title");
			$title=$this->validate($urititle);

			$urisubtitle=$this->input->post("subtitle");
			$subtitle=$this->validate($urisubtitle);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"id"=>$homeid,
								"title"=>$title,
								"subtitle"=>$subtitle,
								"visible" => $visible
							);
							
			$query=$this->roder_model->update_opsi($dataToEdit);
			
			echo "";
		}
	}

	function move_slider_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");
			
			$urisliderid=$this->input->get("id");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->sliderservice_model->index_up($sliderid,$index);
			
			echo "";
		}
	}

	function move_slider_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");

			$urisliderid=$this->input->get("id");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->sliderservice_model->index_down($sliderid,$index);
			
			echo "";
		}
	}

	function move_kanvasing_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("kanvasing_model");
			
			$urisliderid=$this->input->get("id");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->kanvasing_model->index_up($sliderid,$index);
			
			echo "";
		}
	}

	function move_kanvasing_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("kanvasing_model");

			$urisliderid=$this->input->get("id");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->kanvasing_model->index_down($sliderid,$index);
			
			echo "";
		}
	}

	function edit_kanvasing()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("kanvasing_model");
			
			$uriid=$this->input->post("id");
			$id=$this->validate($uriid);
			
			$urinama=$this->input->post("nama");
			$nama=$this->validate($urinama);

			$urialamat=$this->input->post("alamat");
			$alamat=$this->validate($urialamat);

			$urikelurahan=$this->input->post("kelurahan");
			$kelurahan=$this->validate($urikelurahan);

			$urikecamatan=$this->input->post("kecamatan");
			$kecamatan=$this->validate($urikecamatan);

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"id"=>$id,
								"nama"=>$nama,
								"alamat" => $alamat,
								"kelurahan" => $kelurahan,
								"kecamatan" => $kecamatan,
								"visible" => $visible
							);
							
			$query=$this->kanvasing_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function move_opsi_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder");
			
			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->roder_model->index_up($sliderid,$index);
			
			echo "";
		}
	}

	function move_opsi_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("roder_model");

			$urisliderid=$this->input->get("ID_slider");
			$sliderid=$this->db->escape($urisliderid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->roder_model->index_down($sliderid,$index);
			
			echo "";
		}
	}

	function move_layanan_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");
			
			$urilayananid=$this->input->get("ID_layanan");
			$id_event=$this->db->escape($urilayananid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->event_model->index_up($id_event,$index);
			
			echo "";
		}
	}

	function move_layanan_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("event_model");

			$urilayananid=$this->input->get("ID_layanan");
			$id_event=$this->db->escape($urilayananid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->event_model->index_down($id_event,$index);
			
			echo "";
		}
	}

	function move_service_up()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");
			
			$uriserviceid=$this->input->get("ID_service");
			$id_service=$this->db->escape($uriserviceid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex-1);
			
			$query=$this->service_model->index_up($id_service,$index);
			
			echo "";
		}
	}

	function move_service_down()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("service_model");

			$uriserviceid=$this->input->get("ID_service");
			$id_service=$this->db->escape($uriserviceid);
				
			$uriindex=$this->input->get("index");
			$index=$this->db->escape($uriindex+1);
			
			$query=$this->service_model->index_down($id_service,$index);
			
			echo "";
		}
	}
	
	function update_slider_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("slider_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/slide/slides/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"imageID"=>$imageid,
								"imagePath"=>$picture
							);
							
			$query=$this->slider_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function update_slider_service_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");
			
			$uriimageid=$this->input->get("id");
			$imageid=$this->validate($uriimageid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("images/services-carousel/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_slider"=>$imageid,
								"imagePath"=>$picture
							);
							
			$query=$this->sliderservice_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function edit_slider_service()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("sliderservice_model");
			
			$urihomeid=$this->input->post("id");
			$homeid=$this->validate($urihomeid);
			
			$uriname=$this->input->post("name");
			$name=$this->validate($uriname);

			$uricontent=$this->input->post("content");
			$content= "'".$uricontent."'";

			$urivisible=$this->input->post("visible");
			$visible= $this->validate($urivisible);
			
			$dataToEdit=array(
								"ID_slider"=>$homeid,
								"imageTitle"=>$name,
								"content" => urldecode($content),
								"visible" => $visible
							);
							
			$query=$this->sliderservice_model->update_slider($dataToEdit);
			
			echo "";
		}
	}

	function update_how_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("how_model");
			
			$urihowid=$this->input->get("id");
			$howid=$this->validate($urihowid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/full/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_hows"=>$howid,
								"how_pict"=>$picture
							);
							
			$query=$this->how_model->update_image($dataToEdit);
			
			echo "";
		}
	}

	function update_news_image()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("blog_model");
			
			$uriblogid=$this->input->get("id");
			$blogid=$this->validate($uriblogid);
			
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = md5(time().uniqid()).".jpg";
				file_put_contents("image/blog/".$filename,$str);
				
				$picture=$this->db->escape($filename);			
			}
			else
				$picture=$this->db->escape("");
			
			$dataToEdit=array(
								"ID_blog"=>$blogid,
								"image"=>$picture
							);
							
			$query=$this->blog_model->update_image($dataToEdit);
			
			echo "";
		}
	}


	function retrieve_news()
	{
		$this->load->model("blog_model");
		
		$blogList=$this->blog_model->get_full_blog();
		
		echo json_encode($blogList);
	}

	function retrieve_news_detail()
	{
		$this->load->model("blog_slider_model");

		$ID_blog = $this->input->get("ID_blog");
		
		$blogList=$this->blog_slider_model->get_full_blog_slider($ID_blog);
		
		echo json_encode($blogList);
	}
	
	function retrieve_team()
	{
		$this->load->model("team_model");
		
		$teamList=$this->team_model->get_team();
		
		echo json_encode($teamList);
	}

	function retrieve_portfolio()
	{
		$this->load->model("image_model");
		
		$imageList=$this->image_model->get_full_image();
		
		echo json_encode($imageList);
	}
	
	function update_logo()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			move_uploaded_file($_FILES['logolight']['tmp_name'], "images/logo-light.png");
			move_uploaded_file($_FILES['logodark']['tmp_name'], "images/logo-dark.png");
			echo "";
		}
	}

	function update_cv()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$this->load->model("config_model");
				
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "cv.pdf";
				file_put_contents("image/cv/".$filename,$str);
				
				$file=$this->db->escape($filename);			
			}
			else
				$file="";
										
			$query=$this->config_model->update_cv($file);
			
			echo $filename;
		}
	}

	public function intro_change_wallpaperProfile()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "pattern-profile.png";
				file_put_contents("images/patterns/".$filename,$str);
				
				echo "";				
			}
		}
	}
	

	public function intro_change_wallpaper()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "pattern-layanan.jpg";
				file_put_contents("images/patterns/".$filename,$str);
				
				echo "";				
			}
		}
	}

	public function intro_change_buy_wallpaper()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "pattern-buy.jpg";
				file_put_contents("images/patterns/".$filename,$str);
				
				echo "";				
			}
		}
	}

	public function upload_file_catalog()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "catalog.pdf";
				file_put_contents("images/upload/".$filename,$str);
				
				echo "";				
			}
		}
	}

	public function upload_file_terms()
	{
		$isLogin=$this->session->userdata("id");
		if ($isLogin)
		{
			$str = file_get_contents('php://input');
			if ($str!="")
			{
				$filename = "terms.pdf";
				file_put_contents("images/upload/".$filename,$str);
				
				echo "";				
			}
		}
	}
	

	function send_booking()
	{
		$this->load->model("contact_model");
		$this->load->model("booking_model");

		$contactList=$this->contact_model->get_contact();

		$uriid = $this->input->post("id");
		$id = $this->validate($uriid);

		$urititle=$this->input->post("title");
		$title=$this->validate($urititle);
		
		$urimessage=$this->input->post("msg");
		$message=$this->validate($urimessage);
		
		$booking=$this->booking_model->get_booking_by_id($id);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if ($urimessage!="" && $uriname!="")
		{		
			$mail=mail(
					$booking->contact_email,
					$urititle,
					nl2br($urimessage),$headers);
			
			if ($mail)
				echo "0";		
			else
				echo "2";
		}
		else
			echo "1";
	}

	function send_email()
	{
		$this->load->model("contact_model");
		
		$contactList=$this->contact_model->get_contact();
		
		$uriname=$this->input->post("s_name");
		$name=$this->validate($uriname);
		
		$urisubject=$this->input->post("s_subject");
		$subject=$this->validate($urisubject);
		
		$uriemail=$this->input->post("s_email");
		$email=$this->validate($uriemail);

		$urimessage=$this->input->post("s_message");
		$message=$this->validate($urimessage);
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if ($urimessage!="" && $uriname!="")
		{		
			$mail=mail(
					$contactList->email,
					"Messages From Purepack.id : ".$urisubject,
					"From : ".$uriname."<br/>
					Subject : ".$urisubject."<br/>
					Email : ".$uriemail."<br />
					<br/><br/>
					".ucfirst($urimessage),$headers);

			if ($contactList->email2 != "") {
				$mail=mail(
						$contactList->email2,
						"Messages From Purepack.id : ".$urisubject,
						"From : ".$uriname."<br/>
						Subject : ".$urisubject."<br/>
						Email : ".$uriemail."<br />
						<br/><br/>
						".ucfirst($urimessage),$headers); 
			}
			
			if ($mail)
				echo "0";		
			else
				echo "2";
		}
		else
			echo "1";
	}

	public function do_subscribe()
	{
		$this->load->model("contact_model");

		
		//Get Parameter
		$email=$this->input->post("txt_email_newsletter");
		
		$evoMail = $this->contact_model->get_contact();
		
		if ($email!="")
		{
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'From: '.$email . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			//$headers .= 'From: HolidayMood' . "\r\n";
			mail($evoMail->email,"Newsletter email Evo Nusa Bersaudara","Hei, i want to subscribe to your newsletter", $headers);
			redirect(base_url());
		}
		else
			echo "1";	
	}
}