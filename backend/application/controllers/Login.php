<?php
require_once "Custom_CI_Controller.php";
/**
* 
*/
class Login extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(false); 
		$this->load->library('PHPMailerLib');
		$this->load->library("html");
		$this->load->helper("form");
		$this->load->helper('captcha');

		// Set Email CSS
		$this->html->useCSS("dist/email/email.css");
	}

	public function index(){
		$options = array( "img_path" => "./captcha/",
						   "img_url" => base_url("captcha"),
						   "img_width" => '320',
						   'img_height' => '50',
						   'font_size' => 16,
						   'word_length' => 6,
						   'font_path' => "C:/xampp/htdocs/littleindo/backend/dist/fonts/AvantGardeBookBT.ttf",
						   'expiration' => 7200);
		$cap = create_captcha($options);
		$data['captcha'] = $cap['image'];

		$this->session->set_userdata("captchaword", $cap['word']);

		$this->load->view("Login_new_view", $data);
	}

	// public function send_email()
	// {
	// 	$content = "Test Anda";

	// 	$response = $this->crawlSMTP($this->config->item("smtpUrl"), $this->config->item("from"),$this->config->item("fromName"), "operak004@gmail.com", 'Test Checking', $content);

	// 	$this->crawlSMS("6282112126188", "Test SMS");

	// 	echo $response;
	// }

	public function register() {
		$this->load->view("Register_view");
	}

	public function refreshCaptcha()
	{
		$options = array( "img_path" => "./captcha/",
						   "img_url" => base_url("captcha"),
						   "img_width" => '320',
						   'img_height' => '50',
						   'font_size' => 16,
						   'word_length' => 6,
						   'font_path' => "C:/xampp/htdocs/littleindo/backend/dist/fonts/AvantGardeBookBT.ttf",
						   'expiration' => 7200);
		$cap = create_captcha($options);

		$this->session->set_userdata("captchaword", $cap['word']);
		return $cap['image'];
	}

	public function confirm(){
		$this->load->model("Login_model");
		$this->load->model("User_model");

		$username = $this->input->POST("username");
		$password = $this->input->post("password");
		$captcha = $this->input->post("captcha");
		$data = array();

		if ($captcha == $this->session->userdata("captchaword"))
		{
			$req = $this->Login_model->check($username,$password);

			if ($req == true) {
				$user = $this->Login_model->getUserByUsername($username);
				if ($user->active == 1)
				{
					if ($user->is_expired == 0 || (time() <= strtotime($user->expired_dt) && $user->is_expired == 1)) 
					{
						$this->session->set_userdata("userID", $user->userid);
						$this->session->set_userdata("position", $user->position);
						$this->session->set_userdata("username", $username);
						$this->session->set_userdata("photo", $user->photo);
						$this->session->set_userdata("name", $user->employee_name);
						// $this->session->set_userdata("businessID", $user->businessID);
						// $this->session->set_userdata("typeID", $user->typeID);
						// $this->session->set_userdata("isDukcapil", $user->isDukcapil);
      //                   $this->session->set_userdata("level", $user->level);
						
                                                
                        redirect(site_url("Home")); 

					} else{
						$data['captcha'] = $this->refreshCaptcha();
						$data["err"] = 'Your account has been expired.';
						$this->load->view("Login_new_view",$data);
					}
				} else{
					$data['captcha'] = $this->refreshCaptcha();
					$data["err"] = 'Your account is not active.';
					$this->load->view("Login_new_view",$data);
				}
			}
			else{
				$data['captcha'] = $this->refreshCaptcha();
				$data["err"] = 'Wrong username or password.';
				$this->load->view("Login_new_view",$data);
			}
		} else {
			$data['captcha'] = $this->refreshCaptcha();
			$data["err"] = 'Wrong captcha input.';
			$this->load->view("Login_new_view",$data);
		}
	}

	// Forgot Password
	public function forgot(){
		$options = array( "img_path" => "./captcha/",
						   "img_url" => base_url("captcha"),
						   "img_width" => '320',
						   'img_height' => '50',
						   'font_size' => 16,
						   'word_length' => 6,
						   'font_path' => "./dist/fonts/AvantGardeBookBT.ttf",
						   'expiration' => 7200);
		$cap = create_captcha($options);
		$data['captcha'] = $cap['image'];

		$this->session->set_userdata("captchaword", $cap['word']);

		$this->load->view("Forgot_view", $data);
	}

	public function confirm_forgot(){
		$this->load->model("Login_model");
        $this->load->model("User_model");
		$username = $this->input->POST("username");
		$captcha = $this->input->post("captcha");
		$data = array();

		if ($captcha == $this->session->userdata("captchaword"))
		{
			$user = $this->Login_model->getUserByUsername($username);

			if ($user != null) {
				
				if ($user->active == 1)
				{
					if ($user->is_expired == 0 || (time() <= strtotime($user->expired_dt) && $user->is_expired == 1)) 
					{
						
						$newPass = $this->generate_random(8, "alnum");

						// Update New Password
						$dataToUpdate = array("password" => sha1($newPass));
						$this->User_model->update($dataToUpdate, $user->userID);

						$param = array("name" => $user->employee_name, 
									   "username" => $user->username,
									   "password" => $newPass,
									   "email" => "sdki_fpddk@dukcapil.kemendagri.go.id",
									   "app" => APP_NAME);

						$str = $this->html->openTemplate("dist/email/forgotpass.txt");
						$content = $this->html->compileHtmlParam($str, $param);
						$this->crawlSMTP($this->config->item("smtpUrl"), $this->config->item("from"),$this->config->item("fromName"), $user->Email, 'Forgot Password SI-FILMA', $content);

						$data['captcha'] = $this->refreshCaptcha();
						$data["err"] = 'New password has been sent to your email. Check it out!';
						$this->load->view("Forgot_view",$data);
					} else{
						$data['captcha'] = $this->refreshCaptcha();
						$data["err"] = 'Your account has been expired.';
						$this->load->view("Forgot_view",$data);
					}
				} else{
					$data['captcha'] = $this->refreshCaptcha();
					$data["err"] = 'Your account is not active.';
					$this->load->view("Forgot_view",$data);
				}
			}
			else{
				$data['captcha'] = $this->refreshCaptcha();
				$data["err"] = 'Username is not registered.';
				$this->load->view("Forgot_view",$data);
			}
		} else {
			$data['captcha'] = $this->refreshCaptcha();
			$data["err"] = 'Wrong captcha input.';
			$this->load->view("Forgot_view",$data);
		}
	}


	public function check_username() {
		$this->load->model("Register_model");

		// Get Parameter
		$username = $this->input->get("username");

		$res = $this->Register_model->check_username($username);
		if ($res)
			echo 1;
		else
			echo 0;
	}

	public function save_register() {
		$this->load->model("Register_model");

		// Get Parameter
		$nama = $this->input->post("nama");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$nama_lembaga = $this->input->post("nama_lembaga");
		$alamat = $this->input->post("alamat");
		$kota = $this->input->post("kota");
		$provinsi = $this->input->post("provinsi");
		$email = $this->input->post("email");
		$notelp = $this->input->post("notelp");

		$data = array("typeNm" => $nama_lembaga,
					  "employee_name" => $nama,
					  "username" => $username,
					  "password" => $password,
					  "address" => $alamat,
					  "kota" => $kota,
					  "provinsi" => $provinsi,
					  "email" => $email,
					  "notelp" => $notelp);
		$this->Register_model->add_data($data);
		redirect(base_url()."login/success");
	}

	public function success() {
		$this->load->view("Success_view");
	}
        
    function sendOTPSMSDigital($msisdn,$message) { 
		
		
		
		// Your Account SID and Auth Token from twilio.com/console
		
		$cURLConnection = curl_init();
		$url = 'https://smsdigital.co.id/otp/sendsms/?user=dukcapilapi&password=Dukcapilapi&senderid=DUKCAPIL&msisdn='.$msisdn.'&message='.urlencode($message);
		
		curl_setopt($cURLConnection, CURLOPT_URL,$url );
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

		$smsstatus = curl_exec($cURLConnection);
		curl_close($cURLConnection);

		//$jsonArrayResponse = json_decode($smsstatus);
		
				  
	}
}