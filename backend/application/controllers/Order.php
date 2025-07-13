<?php
require_once "Custom_CI_Controller.php";
/**
 * 
 */
class Order extends Custom_CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('PHPMailerLib');
		$this->load->library("html");
		$this->load->helper('form');

		// Set Email CSS
		$this->html->useCSS("dist/email/email.css");

		if ($this->session->userdata("position") != POSITION_SUPERADMIN) {
			show_404();
		}
	}

	public function index()
	{
		$this->load->model("Order_model");
		if ($this->input->post("action") == null) {
			$req = "";
		} else {
			$req = $this->input->post("action");
		}
		if ($this->input->post("action2")==null) {
			$req2 = "P";	
		}
		else{
			$req2 = $this->input->post("action2");
		}
		$data = array();

		$data["temp"] = $req;
		$data["temp2"] = $req2;
		$data['view_branch'] = $this->Order_model->get_all_store();
		$data['view_detail'] = $this->Order_model->get_all_detail();
		$data["view_user"] = $this->Order_model->get_all_order($req,$req2);


		$this->load->view("Order_view", $data);
	}

	public function accept()
	{
		$this->load->model("Order_model");
		$typeID = $this->input->get("typeID");
		$req = $this->input->get("id2");

		$this->Order_model->complete_order($typeID);

		$stats = $this->Order_model->status_detail($typeID);

		if($stats='D'){
			$data2= array("transStatus" => $stats);
			$this->Order_model->status_transc($data2, $req);
		}else{
			$data2= array("transStatus" => 'P');
			$this->Order_model->status_transc($data2, $req);
		}

		redirect(site_url("Order"));
	}

	public function reject()
	{
		// Load Model
		$this->load->model("Order_model");
		$data = array();

		$id = $this->input->post("id");
		$catatan = $this->input->post("catatan");
		$stats = $this->input->post("stats");
		$req = $this->input->post("id2");

		$data = array(
			"reason" => $catatan,
			"status" => "R"
		);

		$this->Order_model->reject_order($data, $id);

		$stats = $this->Order_model->status_detail($req);

		if($stats=='R'){
			$data2= array("transStatus" => $stats);
			$this->Order_model->status_transc($data2, $req);
		}else{
			$data2= array("transStatus" => 'P');
			$this->Order_model->status_transc($data2, $req);
		}

		redirect(site_url("Order"));
	}

	public function Delete()
	{
		$this->load->model("User_model");
		$req = $this->input->get("d");
		$this->User_model->delete_user($req);

		redirect(site_url("User"));
	}

	public function Update()
	{
		$this->load->model("User_model");
		$data = array();

		$req = $this->input->get("d");
		$data["req"] = $this->input->get("d");
		$data["viewUser"] = $this->User_model->get_all_user_update($req);

		$this->load->view("Add_view_user", $data);
	}

	public function add_user_view()
	{
		// Retrieve Master Data
		$this->load->model("Cert_type_model");

		// Retrieve Data
		$data = array();
		$data["pengguna"] = $this->Cert_type_model->get_type();

		$this->load->view("Add_view_user", $data);
	}
	public function add_user()
	{
		$this->load->model("User_model");
		$nameUser = $this->input->post("nameUser");
		$addressUser = $this->input->post("addressUser");
		$phoneUser = $this->input->post("phoneUser");
		$emailUser = $this->input->post("emailUser");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$position = $this->input->post("position");
		$active = $this->input->post("active");
		$isExpired = $this->input->post("isExpired");
		$expiredDt = $this->input->post("expiredDt");

		$value = $this->db->query("SELECT userid as value FROM user_web ORDER BY userid DESC LIMIT 1")
			->row()->value;
		$code = "US";
		$incrmt = substr($value, 3, 8);

		$msg = "";
		if ($nameUser == "") {
			$msg = "Harap mengisi nama terlebih dahulu.";
		} elseif ($addressUser == "") {
			$msg = "Harap mengisi alamat.";
		} elseif ($phoneUser == "") {
			$msg = "Harap mengisi no telpon.";
		} elseif (!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
			$msg = "Harap mengisi email sesuai dengan format.";
		} elseif ($username == "") {
			$msg = "Harap mengisi username";
		} elseif ($password == "" || strlen($password) < 7) {
			$msg = "Harap mengisi password dengan panjang lebih dari 6.";
		}

		if ($msg != "") {
			$data = array("err" => $msg);
			$this->load->view("Add_view_user", $data);
		} else {

			$incrmt += 1;

			if (strlen($incrmt) == 1) {
				$incrmt = '000000' . $incrmt;
			} else if (strlen($incrmt) == 2) {
				$incrmt = '00000' . $incrmt;
			} else if (strlen($incrmt) == 3) {
				$incrmt = '0000' . $incrmt;
			} else if (strlen($incrmt) == 4) {
				$incrmt = '000' . $incrmt;
			} else if (strlen($incrmt) == 5) {
				$incrmt = '00' . $incrmt;
			} else if (strlen($incrmt) == 6) {
				$incrmt = '0' . $incrmt;
			} else {
			}

			$userID = $code . $incrmt;

			$data = array(
				"userid" => $userID,
				"username" => $username,
				"password" => sha1($password),
				"employee_name" => $nameUser,
				"position" => $position,
				"email" => $emailUser,
				"address" => $addressUser,
				"phone" => $phoneUser,
				"active" => (!isset($active)) ? 0 : $active,
				"is_expired" => (!isset($isExpired)) ? 0 : $isExpired,
				"expired_dt" => ($expiredDt == "") ? null : date('Y-m-d', strtotime($expiredDt))
			);

			$this->User_model->add($data);

			redirect(site_url("User"));
		}
	}

	public function update_user()
	{
		$this->load->model("User_model");
		$userID = $this->input->post("userID");
		$nameUser = $this->input->post("nameUser");
		$addressUser = $this->input->post("addressUser");
		$phoneUser = $this->input->post("phoneUser");
		$emailUser = $this->input->post("emailUser");
		$username = $this->input->post("username");
		$password = sha1($this->input->post("password"));
		// $ktpNo = $this->input->post("ktpNo");
		// $gender = $this->input->post("gender");
		$position = $this->input->post("position");
		$active = $this->input->post("active");
		$isExpired = $this->input->post("isExpired");
		$expiredDt = $this->input->post("expiredDt");

		$data = array(
			"username" => $username,
			"employee_name" => $nameUser,
			"position" => $position,
			"email" => $emailUser,
			"address" => $addressUser,
			"phone" => $phoneUser,
			"active" => (!isset($active)) ? 0 : $active,
			"is_expired" => (!isset($isExpired)) ? 0 : $isExpired,
			"expired_dt" => ($expiredDt == "") ? null : date('Y-m-d', strtotime($expiredDt))
		);

		$this->User_model->update($data, $userID);

		redirect(site_url("User"));
	}

	public function chg_pass()
	{
		$userID = $this->input->get("d");
		$data = array("userID" => $userID);
		$this->load->view("Change_pass_user", $data);
	}

	public function submitpass()
	{
		$this->load->model("User_model");

		// Get Parameter
		$userID = $this->input->post("userID");
		$newpass = $this->input->post("newpass");
		$confirm = $this->input->post("confirm");

		$data = array();
		$err = "";
		if ($newpass == "") {
			$err = "New password must be filled !";
		} else if ($confirm == "") {
			$err = "Confirmation must be filled !";
		} else if ($newpass != $confirm) {
			$err = "New password and confirmation do not match";
		} else {
			$col = array("password" => sha1($newpass));
			$this->User_model->update($col, $userID);
			redirect(site_url("User"));
		}
		if ($err != "") {
			$data["err"] = $err;
			$data["userID"] = $userID;
			$this->load->view("Change_pass_user", $data);
		}
	}

	public function sendNotifPKS()
	{
		$this->load->model("User_model");

		$users = $this->User_model->get_all_user_by_pks_exp();
		foreach ($users as $u) {
			$param = array(
				"name" => $u->employee_name,
				"no_pks" => $u->no_pks,
				"tgl_berakhir" => date("d M Y", strtotime($u->tgl_berakhir)),
				"email" => "sdki_fpddk@dukcapil.kemendagri.go.id",
				"app" => APP_NAME
			);
			$str = $this->html->openTemplate("dist/email/pks.txt");
			$content = $this->html->compileHtmlParam($str, $param);
			$this->crawlSMTP($this->config->item("smtpUrl"), $this->config->item("from"), $this->config->item("fromName"), $u->Email, 'Permohonan Perpanjangan PKS', $content);
		}

		echo "Success";
	}
}
