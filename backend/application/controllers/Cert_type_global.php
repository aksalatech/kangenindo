<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Cert_type_global extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");

		// if ($this->session->userdata("position") != POSITION_SUPERADMIN) {
		// 	show_404();
		// }
	}

	public function insert(){
		$this->load->model("Prov_model");
		$this->load->model("Kabkot_model");
		$this->load->model("Fakultas_model");
		$this->load->model("Pekerjaan_model");
		$this->load->model("Keahlian_model");
		$this->load->model("Tktpddk_model");
		$this->load->model("Angkatan_model");

		$data=array();
		$data["provList"] = $this->Prov_model->get_all_type();
		$data["kabList"] = $this->Kabkot_model->get_all_type();
		$data["angkatanList"] = $this->Angkatan_model->get_active_type();
		$data["fakultasList"] = $this->Fakultas_model->get_active_type();
		$data["pekerjaanList"] = $this->Pekerjaan_model->get_active_type();
		$data["keahlianList"] = $this->Keahlian_model->get_active_type();
		$data["tktpddkList"] = $this->Tktpddk_model->get_active_type();
		$this->load->view("Insert_cert_type",$data);
	}

	public function add_type(){
		$this->load->model("Cert_type_model");

		$msg="";
		$nama = $this->input->post("nama");
		$nrp_nim = $this->input->post("nrp_nim");
		$angkatan = $this->input->post("angkatan");
		$sex = $this->input->post("sex");
		$email = $this->input->post("email");
		$program_studi = $this->input->post("program_studi");
		$no_hp = $this->input->post("no_hp");
		$pekerjaan = $this->input->post("pekerjaan");
		$pekerjaan_lainnya = $this->input->post("pekerjaan_lainnya");
		$keahlian = $this->input->post("keahlian");
		$keahlian_lainnya = $this->input->post("keahlian_lainnya");
		$province_nm = $this->input->post("province_nm");
		$kabkota_nm = $this->input->post("kabkota_nm");
		$status_hidup = $this->input->post("status_hidup");
		$tkt_pddk = $this->input->post("tkt_pddk");
		$dates = date("Y-m-d h:i:s");
		$tempatlahir=$this->input->post("tmptlahir");
		$tanggallahir=$this->input->post("tgllhr");
		$tahunmulai=$this->input->post("tahunmasuk");
		$tahunselesai=$this->input->post("tahunkeluar");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'nama' => $nama,
			'nrp_nim' => $nrp_nim,
			'angkatan' => $angkatan,
			'sex' => $sex,
			'email' => $email,
			'program_studi' => $program_studi,
			'no_hp' => $no_hp,
			'pekerjaan' => $pekerjaan,
			'pekerjaan_lainnya' => $pekerjaan_lainnya,
			"keahlian" => $keahlian,
			'keahlian_lainnya' => $keahlian_lainnya,
			'province_nm' => $province_nm,
			'kabkota_nm' => $kabkota_nm,
			'tkt_pddk' => $tkt_pddk,
			'status_hidup' => $status_hidup,
			'last_update' => $dates,
			'tempat_lahir' => $tempatlahir,
			'tanggal_lahir' => date("Y-m-d", strtotime($tanggallahir)),
			'tanggal_masuk' => $tahunmulai,
			'tanggal_selesai' => $tahunselesai,
			"is_manual" => 1
		);

		$this->Cert_type_model->add($data);


		redirect(site_url("Cert_type_global/success"));

	}

	public function success() {
		$this->load->view("success_view");
	}

	public function success2() {
		$this->load->view("success_view2");
	}


	public function absence(){
		$this->load->model("Prov_model");
		$this->load->model("Kabkot_model");
		$this->load->model("Fakultas_model");
		$this->load->model("Pekerjaan_model");
		$this->load->model("Keahlian_model");
		$this->load->model("Tktpddk_model");
		$this->load->model("Angkatan_model");
		$this->load->model("Settings_model");

		$data=array();
		$config=$this->Settings_model->get_list_config();

		$data['configList']=$config;
		$data["provList"] = $this->Prov_model->get_all_type();
		$data["kabList"] = $this->Kabkot_model->get_all_type();
		$data["angkatanList"] = $this->Angkatan_model->get_active_type();
		$data["fakultasList"] = $this->Fakultas_model->get_active_type();
		$data["pekerjaanList"] = $this->Pekerjaan_model->get_active_type();
		$data["keahlianList"] = $this->Keahlian_model->get_active_type();
		$data["tktpddkList"] = $this->Tktpddk_model->get_active_type();
		$this->load->view("Absence_view",$data);
	}

	public function cari_nrp() {
		$this->load->model("Cert_type_model");

		// Get Data
		$req = $this->input->get("nrp");

		$viewProduct = $this->Cert_type_model->get_one_type_by_cleaned_nrp($req);
		echo json_encode($viewProduct);
	}

	public function submit_absence(){
		$this->load->model("Cert_type_model");

		$msg="";
		$nama = $this->input->post("nama");
		$nrp_nim = $this->input->post("nrp_nim");
		$angkatan = $this->input->post("angkatan");
		$sex = $this->input->post("sex");
		$email = $this->input->post("email");
		$program_studi = $this->input->post("program_studi");
		$no_hp = $this->input->post("no_hp");
		$pekerjaan = $this->input->post("pekerjaan");
		$pekerjaan_lainnya = $this->input->post("pekerjaan_lainnya");
		$keahlian = $this->input->post("keahlian");
		$keahlian_lainnya = $this->input->post("keahlian_lainnya");
		$province_nm = $this->input->post("province_nm");
		$kabkota_nm = $this->input->post("kabkota_nm");
		$status_hidup = $this->input->post("status_hidup");
		$tkt_pddk = $this->input->post("tkt_pddk");
		$dates = date("Y-m-d h:i:s");
		$tempatlahir=$this->input->post("tmptlahir");
		$tanggallahir=$this->input->post("tgllhr");
		$tahunmulai=$this->input->post("tahunmasuk");
		$tahunselesai=$this->input->post("tahunkeluar");

		$latitude=$this->input->post("latitude");
		$langitude=$this->input->post("langitude");
		$alamat=$this->input->post("alamat");
		$city=$this->input->post("city");
		$country=$this->input->post("country");
		$att_type=$this->input->post("att_type");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'nama' => $nama,
			'nrp_nim' => $nrp_nim,
			'angkatan' => $angkatan,
			'sex' => $sex,
			'email' => $email,
			'program_studi' => $program_studi,
			'no_hp' => $no_hp,
			'pekerjaan' => $pekerjaan,
			'pekerjaan_lainnya' => $pekerjaan_lainnya,
			"keahlian" => $keahlian,
			'keahlian_lainnya' => $keahlian_lainnya,
			'province_nm' => $province_nm,
			'kabkota_nm' => $kabkota_nm,
			'tkt_pddk' => $tkt_pddk,
			'status_hidup' => $status_hidup,
			'last_update' => $dates,
			'tempat_lahir' => $tempatlahir,
			'tanggal_lahir' => date("Y-m-d", strtotime($tanggallahir)),
			'tanggal_masuk' => $tahunmulai,
			'tanggal_selesai' => $tahunselesai,
			"is_manual" => 1
		);

		$this->Cert_type_model->add($data);

		// Add Absence
		$dataAbsence = array("nrp_nim" => $nrp_nim,
							 "absence_date" => date("Y-m-d H:i:s"),
							 "att_type" => $att_type,
							 "latitude" => $latitude,
							 "langitude" => $langitude,
							 "alamat" => $alamat,
							 "city" => $city,
							 "country" => $country);
		$this->Cert_type_model->add_absence($dataAbsence);

		redirect(site_url("Cert_type_global/success2"));

	}
}