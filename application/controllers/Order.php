<?php
class Order extends CI_Controller
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

	public function fetchImageFromUrl($imageUrl, $savePath) {
		// Fetch the image data
		$imageData = file_get_contents($imageUrl);

		if ($imageData !== false) {
		    // Save the image to the specified path
		    $saveResult = file_put_contents($savePath, $imageData);

		    if ($saveResult !== false) {
		        echo '';
		    } else {
		        echo 'Error saving image to file.';
		    }
		} else {
		    echo 'Error fetching image data from URL.';
		}
	}
	
	function index()
	{
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");
        $this->load->model("Brand_model");
		
		$imgList=array();
		$img=array();

		$page = "location";
		
		$uristore = $this->input->post("store");
		
		$isLogin=$this->session->userdata("id");
		$config=$this->config_model->get_config();
		$contact=$this->contact_model->get_contact();
		$storeLocation = $this->input->get("store");
		
		$data['error']=0;
		$data['config']=$config;
        $data['categoryList'] = $this->category_model->get_category();
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['banner'] = $bannerList; 
		$data['contact'] = $contact;
		$data['storeList'] = $this->location_model->get_all_store();
		$data['storeLocation'] = $storeLocation;
        $data['brandList'] = $this->Brand_model->get_active_brand();

		$this->load->view("order_view",$data);
	}

	function menu($store)
	{
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");
		$this->load->model("Login_model");
        $this->load->model("Brand_model");
		
		// Get Parameter
		$u = $this->input->get("u");

		$page = "menu";
		
		$config=$this->config_model->get_config();
        $brand = $this->input->get("brand");
		$storeLocation = $store;

        if($brand != "") {
            $brand = $this->input->get("brand");
        } else {
            $brand = "1";
        }
		
		$data['error']=0;
		$data['config']=$config;
		$data['aboutList']=$this->about_model->get_about();
		$data['contact']=$this->contact_model->get_contact();
		$imageList=$this->image_model->get_visible_image();
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['fullimageList']=$this->image_model->get_full_image_by_brand($brand);
		$data['categoryList'] = $this->category_model->get_category_by_brand($brand);
		$data['storeList'] = $this->location_model->get_all_store();
		$data['store'] = $this->location_model->get_one_store_by_id($store);
        $data['brands'] = $this->Brand_model->get_one_brand($brand);
        $data['brandList'] = $this->Brand_model->get_active_brand();

		$jsonorder = $this->session->userdata("jsonorder");
		if ($jsonorder != "" & $u != "") {
	   	 	$order = json_decode($jsonorder);
			$data['carts'] = $order->carts;
			$data['time'] = $order->time;
			$data['users'] = $this->Login_model->getUserByID($u);
		}

		$data['readonly'] = false;
		$data['imageList']=$imageList;
		$data['banner'] = $bannerList;
		$data['storeLocation'] = $storeLocation;
	
		$this->load->view("menu_all_view",$data);
	}

	// Google Sign In
	public function prelogin() {
		// Get Parameter
		// echo $type." ".$token;
		$store = $this->input->post("store");
        $carts = $this->input->post("carts");
        $time = $this->input->post("time");

        $data = array(
            "store" => $store,
            "time" => $time,
            "carts" => json_decode($carts)
        );

        $json = json_encode($data);
        $this->session->set_userdata("jsonorder", $json);

    	echo 0;
	}

	public function glogin()
    {
        // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = $this->config->item("google_client_id");
        $client_secret = $this->config->item("google_client_secret");
        $redirect_uri = base_url('order/gcallback');

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Connect Collaborate");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        $authUrl = $client->createAuthUrl();
        
        header('Location: '.$authUrl);
    }

    public function gcallback()
    { 
		$this->load->model("Login_model");
		$this->load->model("User_model");;
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");

        // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
	    $client_id = $this->config->item("google_client_id");
        $client_secret = $this->config->item("google_client_secret");
	    $redirect_uri = base_url('order/gcallback');

	    //Create Client Request to access Google API
	    $client = new Google_Client();
	    $client->setApplicationName("Connect Collaborate");
	    $client->setClientId($client_id);
	    $client->setClientSecret($client_secret);
	    $client->setRedirectUri($redirect_uri);
	    $client->addScope("email");
	    $client->addScope("profile");

	    //Send Client Request
	    $service = new Google_Service_Oauth2($client);

	    $client->authenticate($_GET['code']);
	    $_SESSION['access_token'] = $client->getAccessToken();
	    
	    // User information retrieval starts..............................

	    $user = $service->userinfo->get(); //get user info 
	    // print_r($user);

	    $jsonorder = $this->session->userdata("jsonorder");
	    $order = json_decode($jsonorder);


	    // echo "</br> User ID :".$user->id; 
	    // echo "</br> User Name :".$user->name;
	    // echo "</br> Gender :".$user->gender;
	    // echo "</br> User Email :".$user->email;
	    // echo "</br> User Link :".$user->link;    
	    // echo "</br><img src='$user->picture' height='200' width='200' > ";
	    $photo = "";
	    if ($user->picture != "") {
		    $photo = "img-".time().".jpg";
		    $this->fetchImageFromUrl($user->picture, "./uploads/profile/".$photo);
		}
		$req = $this->Login_model->checkIDGoogle($user->id);

		if ($req != null) {
			$this->session->set_userdata("userID", $req->userid);
			$this->session->set_userdata("name", $req->employee_name);
			$this->session->set_userdata("username", $req->username);
			$this->session->set_userdata("email", $req->Email);
			$this->session->set_userdata("position", $req->Position);
			$this->session->set_userdata("photo", $req->Photo);
			$this->session->set_userdata("gender", $req->Sex);
			$this->session->set_userdata("phone", $req->Phone);
			$this->session->set_userdata("fb_key", $req->fb_key);
			$this->session->set_userdata("google_key", $req->google_key);
		} else {
			$data = array(
				"username"=>$user->email,
				"Email"=>$user->email,
				"Sex"=>(strtolower($user->gender) == "male" || $user->gender == "") ? "M" : "F",
				"Position" => POSITION_CLIENT,
				"google_key"=>$user->id,
				"employee_name"=>$user->name,
				"Photo" => $photo,
				"active" => 1
				);
			$userID = $this->Login_model->add($data);

			$this->session->set_userdata("userID", $userID);
			$this->session->set_userdata("username", $user->email);
			$this->session->set_userdata("position", POSITION_CLIENT);
			$this->session->set_userdata("photo", $photo);
			$this->session->set_userdata("email", $user->email);
			$this->session->set_userdata("name", $user->name);
			$this->session->set_userdata("gender", (strtolower($user->gender) == "male" || $user->gender == "") ? "M" : "F");
			$this->session->set_userdata("fb_key", "");
			$this->session->set_userdata("google_key", $user->id);
		}

    	redirect(site_url("Order/menu/".$order->store."?u=".$this->session->userdata("userID")));
		
    }

    public function fbcallback(){
        $this->load->model("Login_model");
        $this->load->model("User_model");

        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $gender = $this->input->post("gender");
        $email = $this->input->post("email");
        $photoUrl = $this->input->post("photo");
    	$type = $this->input->post("type");
		$token = $this->input->post("ref");

		// Set Session
		$store = $this->input->post("store");
        $carts = $this->input->post("carts");
        $time = $this->input->post("time");

        $data = array(
            "store" => $store,
            "time" => $time,
            "carts" => json_decode($carts)
        );

        $json = json_encode($data);
        $this->session->set_userdata("jsonorder", $json);


        $req = $this->Login_model->checkIDFB($id);
        $photo = "";
        if ($photoUrl != "") {
	        $photo = "img-".time().".jpg";
		    $this->fetchImageFromUrl($photoUrl, "./uploads/profile/".$photo);
		}
		if ($req != null) {
			$this->session->set_userdata("userID", $req->userid);
			$this->session->set_userdata("name", $req->employee_name);
			$this->session->set_userdata("username", $req->username);
			$this->session->set_userdata("email", $req->Email);
			$this->session->set_userdata("position", $req->Position);
			$this->session->set_userdata("photo", $req->Photo);
			$this->session->set_userdata("gender", $req->Sex);
			$this->session->set_userdata("phone", $req->Phone);
			$this->session->set_userdata("fb_key", $req->fb_key);
			$this->session->set_userdata("google_key", $req->google_key);
			$userID = $req->userid;
		}
		else{
			$data = array(
				"username"=>$email,
				"Email"=>$email,
				"Sex"=>(strtolower($gender) == "male") ? "M" : "F",
				"fb_key"=>$id,
				"employee_name"=>$name,
				"Position" => POSITION_CLIENT,
				"Photo" => $photo,
				"active" => 1
				);

			$userID = $this->Login_model->add($data);

			$this->session->set_userdata("userID", $userID);
			$this->session->set_userdata("username", $id);
			$this->session->set_userdata("position", POSITION_CLIENT);
			$this->session->set_userdata("photo", $photo);
			$this->session->set_userdata("email", $email);
			$this->session->set_userdata("name", $name);
			$this->session->set_userdata("gender", (strtolower($gender) == "male") ? "M" : "F");
			$this->session->set_userdata("fb_key", $id);
			$this->session->set_userdata("google_key", "");
		}
        
        $user = $this->Login_model->getUserByID($userID);
        echo json_encode($user);
    }

    // Create Order Data
	public function create() {
		$this->load->model("Order_model");
		$this->load->model("Login_model");

		// Get Parameter
		// echo $type." ".$token;
		$store = $this->input->post("store");
        $carts = $this->input->post("carts");
        $time = $this->input->post("time");
        $full_name = $this->input->post("full_name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $promo = $this->input->post("promo");
        $disc = $this->input->post("disc");

        $dataToInsert = array(
        	"transDt" => date("Y-m-d H:i:s"),
        	"userID" => $this->session->userdata("userID"),
        	"id_store" => $store,
            "full_name" => $full_name,
            "email" => $email,
            "phone" => $phone,
            "id_promo" => ($promo != "") ? $promo : null,
            "discAmt" => $disc,
            "pickup_time" => $time,
            "transStatus" => "P"
        );
        $transID = $this->Order_model->add($dataToInsert);

        $totalAmt = 0;
        $cartList = json_decode($carts);
        foreach ($cartList as $c) {
        	$dataDetail = array(
	        	"transID" => $transID,
	        	"menuID" => $c->id,
	        	"menuNm" => $c->name,
	        	"menuOpts" => $c->opts,
	            "qty" => $c->qty,
	            "price" => $c->price
	        );
	        $this->Order_model->add_detail($dataDetail);

	        $totalAmt += ($c->price * $c->qty);
        }

        $dataToInsert = array(
        	"transAmt" => $totalAmt
        );
        $this->Order_model->update($transID, $dataToInsert);

        // Update user phone
        $this->Login_model->update($this->session->userdata("userID"), array("phone" => $phone));
    	
    	echo $transID;
	}


	// Details Order Data
	public function detail($id) {
		$this->load->model("Order_model");
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");
		$this->load->model("Login_model");
		
		// Get Data
		$d = base64_decode($id);
		$order = $this->Order_model->get_one_order($d);

		$page = "order";
		$config=$this->config_model->get_config();
		$data = array();
		$data['error']=0;
		$data['config']=$config;
		$data['aboutList']=$this->about_model->get_about();
		$data['contact']=$this->contact_model->get_contact();
		$imageList=$this->image_model->get_visible_image();
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['fullimageList']=$this->image_model->get_full_image();
		$data['categoryList'] = $this->category_model->get_category();
		$data['readonly'] = false;
		$data['imageList']=$imageList;
		$data['banner'] = $bannerList;
		$data['order'] = $order;
	
		$this->load->view("detail_order_view",$data);
	}

	// Find Order
	public function find() {
		$this->load->model("user_model");
		$this->load->model("config_model");		
		$this->load->model("about_model");
		$this->load->model("contact_model");
		$this->load->model("image_model");
		$this->load->model("category_model");
		$this->load->model("banner_model");
		$this->load->model("location_model");
		$this->load->model("Login_model");
		
		// Get Data
		$page = "location";
		$config=$this->config_model->get_config();
		$data = array();
		$data['error']=0;
		$data['config']=$config;
		$data['aboutList']=$this->about_model->get_about();
		$data['contact']=$this->contact_model->get_contact();
		$imageList=$this->image_model->get_visible_image();
		$bannerList = $this->banner_model->get_banner_page($page);
		$data['imageList']=$imageList;
		$data['banner'] = $bannerList;

		$this->load->view("find_order_view",$data);	
	}

	public function search() {
		$this->load->model("Order_model");

		// Get Parameter
		$no = $this->input->post("no");

		$order = $this->Order_model->get_one_order(intval(str_replace("OR","",$no)));
		if ($order != null)
			echo $order->transID;
		else
			echo -1;
	}

	// Get Promo List
	public function promo_list() {
		$this->load->model("Promo_model");

		// Get promo list data
		$userID = $this->session->userdata("userID");
		$keywords = $this->input->get("keywords");
		$promo = $this->Promo_model->get_active_promo_list($userID, $keywords);

		echo json_encode($promo);
	}
}