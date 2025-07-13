<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Cert_type extends Custom_CI_Controller
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
		$this->load->model("Cert_type_model");
		if ($this->input->post("action")==null) {
			$req = "";	
		}
		else{
			$req = $this->input->post("action");
		}

		if ($this->input->post("action2")==null) {
			$req2 = "";	
		}
		else{
			$req2 = $this->input->post("action2");
		}
		$data = array();
		$data["temp"] = $req;
		$data["temp2"] = $req2;
		$data['view_branch'] = $this->Cert_type_model->get_angkatan();
		$data['view_branch2'] = $this->Cert_type_model->get_tktpddk();
		// $data['view_type'] = $this->Cert_type_model->get_all_type();
		$data['view_type'] = $this->Cert_type_model->get_all_type_req($req,$req2);

		$this->load->view("Cert_type_view",$data);
	}

	public function check_gender($name) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.genderize.io/?name='.$name.'&country_id=ID',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$obj = json_decode($response);
		return $obj->gender;
	}

	public function normalize_data() {
		$this->load->model("Cert_type_model");

		$data = $this->Cert_type_model->get_all_nongender();
		$no = 0;
		foreach ($data as $user) {
			$tokens = explode(" ", $user->nama);
			$tobeCheck = $tokens[0];
			$gender = $this->check_gender($tokens[0]);
			if ($gender == null && sizeof($tokens) > 1) {
				$tobeCheck = $tokens[1];
				$gender = $this->check_gender($tokens[1]);
			}
			$sex = "";
			if ($gender != null) {			
				if ($gender == "male") {
					$sex = "M";
				} else {
					$sex = "F";
				}
			}
			// $tanggal_lahir = $this->convert_date(trim($user->tanggal_lahir));
			$dataToUpdate = array(
				'sex' => $sex
				// 'tempat_lahir' => trim($user->tempat_lahir),
				// 'tanggal_lahir' => $tanggal_lahir
			);
			echo "Alumni ".$user->nama."(".$tobeCheck.")  " .$sex."<br/>";
			
			$this->Cert_type_model->update($user->alumniid,$dataToUpdate);
			$no++;
		}

		echo "$no data telah diupdate !<br/>";
	}

	public function add_type_view(){
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
		$this->load->view("Add_cert_type",$data);
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
			'tanggal_selesai' => $tahunselesai
		);

		$this->Cert_type_model->add($data);
		redirect(site_url("Cert_type"));

	}

	public function update(){
		$this->load->model("Prov_model");
		$this->load->model("Kabkot_model");
		$this->load->model("Cert_type_model");
		$this->load->model("Fakultas_model");
		$this->load->model("Pekerjaan_model");
		$this->load->model("Keahlian_model");
		$this->load->model("Tktpddk_model");
		$this->load->model("Angkatan_model");
		$data = array();

		$req = $this->input->get("typeID");

		$data["req"] = $req;
		$data["provList"] = $this->Prov_model->get_all_type();
		$data["kabList"] = $this->Kabkot_model->get_all_type();
		$data["angkatanList"] = $this->Angkatan_model->get_active_type();
		$data["fakultasList"] = $this->Fakultas_model->get_active_type();
		$data["pekerjaanList"] = $this->Pekerjaan_model->get_active_type();
		$data["keahlianList"] = $this->Keahlian_model->get_active_type();
		$data["tktpddkList"] = $this->Tktpddk_model->get_active_type();
		$data["viewProduct"] = $this->Cert_type_model->get_type_by_id($req);

		$this->load->view("Add_cert_type",$data);
	}

	public function update_type(){
		$this->load->model("Cert_type_model");
		$alumniID = $this->input->post("alumniID");
		$nama = $this->input->post("nama");
		$nrp_nim = $this->input->post("nrp_nim");
		$angkatan = $this->input->post("angkatan");
		$sex = $this->input->post("sex");
		$program_studi = $this->input->post("program_studi");
		$no_hp = $this->input->post("no_hp");
		$email = $this->input->post("email");
		$pekerjaan = $this->input->post("pekerjaan");
		$pekerjaan_lainnya = $this->input->post("pekerjaan_lainnya");
		$keahlian = $this->input->post("keahlian");
		$keahlian_lainnya = $this->input->post("keahlian_lainnya");
		$province_nm = $this->input->post("province_nm");
		$kabkota_nm = $this->input->post("kabkota_nm");
		$status_hidup = $this->input->post("status_hidup");
		$tkt_pddk = $this->input->post("tkt_pddk");
		$tempatlahir=$this->input->post("tmptlahir");
		$tanggallahir=$this->input->post("tgllhr");
		$tahunmulai=$this->input->post("tahunmasuk");
		$tahunselesai=$this->input->post("tahunkeluar");
		$dates = date("Y-m-d h:i:s");
		// $userID = $this->session->userdata("userID");

		$data = array(
			'nama' => $nama,
			'nrp_nim' => $nrp_nim,
			'angkatan' => $angkatan,
			'sex' => $sex,
			'program_studi' => $program_studi,
			'email' => $email,
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
			'tanggal_selesai' => $tahunselesai
		);
		
		$this->Cert_type_model->update($alumniID,$data);
		redirect(site_url("Cert_type"));
	}

	public function delete(){
		$this->load->model("Cert_type_model");
		$typeID = $this->input->get("typeID");

		$this->Cert_type_model->delete($typeID);
		redirect(site_url("Cert_type"));
	}

	public function import() {
		$this->load->model("Cert_type_model");
		$this->load->model("Prov_model");
		$this->load->model("Kabkot_model");
		$this->load->model("Fakultas_model");
		$this->load->model("Pekerjaan_model");
		$this->load->model("Keahlian_model");
		$this->load->model("Tktpddk_model");
		$this->load->model("Angkatan_model");
		$this->load->library("PHPExcel/Classes/PHPExcel");
		// PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

		// Get Parameter
		// $PosID = $this->input->post("PosID");

		// View Param
	    $data = array();
	    $num = 0;
	    $html = "";
	    $html = "<thead>
	                <tr>
	                  <th width='30px'>No.</th>
	                  <th>Nama</th>
	                  <th>NRP</th>
	                  <th>Tempat Lahir</th>
	                  <th>Tanggal Lahir</th>
	                  <th>Angkatan</th>
	                  <th>Jenis Kelamin</th>
	                  <th>Tahun Masuk</th>
	                  <th>Tahun Selesai</th>
	                  <th>Tingkat Pendidikan</th>
	                  <th>Program Studi</th>
	                  <th>Provinsi</th>
					  <th>Kab/Kota</th>
					  <th>No. HP</th>
					  <th>Email</th>
					  <th>Pekerjaan</th>
					  <th>Keahlian</th>
					  <th>Pekerjaan Lainnya</th>
					  <th>Keahlian Lainnya</th>
					  <th>Status Hidup ?</th>
					  <th>Status</th>
	                </tr>
	             </thead>
	             <tbody>";
	    $scsNum = 0;


		// Upload File
		$config["upload_path"] = "./dist/upload/excel";
		$config["file_name"] = md5(time()).".xlsx";
		$config["allowed_types"] = "xlsx";
		$config["max_size"] = 3 * 1024;
		$this->load->library("upload", $config);
		if (!$this->upload->do_upload("fnImport")) {
			//$error = array("error" => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else {
			try{
				$reader = PHPExcel_IOFactory::createReader('Excel2007');
				$phpexcel = $reader->load($config["upload_path"]."/".$config["file_name"]);
			} catch(Zend_Exception $e) {
				echo $e->getMessage();
			}

			$sheet = $phpexcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			for ($row = 2; $row <= $highestRow; $row++) {
				$name = $sheet->getCell("A".$row)->getValue();
				$nrp = $sheet->getCell("B".$row)->getValue();
				$tempat_lahir = $sheet->getCell("C".$row)->getValue();
				$tanggal_lahir = $sheet->getCell("D".$row)->getValue();
				$angkatan = trim($sheet->getCell("E".$row)->getValue());
				$sex = $sheet->getCell("F".$row)->getValue();
				$tahun_masuk = $sheet->getCell("G".$row)->getValue();
				$tahun_selesai = $sheet->getCell("H".$row)->getValue();
				$tingkat_pddk = trim($sheet->getCell("I".$row)->getValue());
				$program_studi = trim($sheet->getCell("J".$row)->getValue());
				$provinsi = trim($sheet->getCell("K".$row)->getValue());
				$kab_kota = trim($sheet->getCell("L".$row)->getValue());
				$no_hp = $sheet->getCell("M".$row)->getValue();
				$email = $sheet->getCell("N".$row)->getValue();
				$pekerjaan = trim($sheet->getCell("O".$row)->getValue());
				$keahlian = trim($sheet->getCell("P".$row)->getValue());
				$pekerjaan_lainnya = $sheet->getCell("Q".$row)->getValue();
				$keahlian_lainnya = $sheet->getCell("R".$row)->getValue();
				$status_hidup = $sheet->getCell("S".$row)->getValue();
				$flag = "";

				$angkatan_obj = $this->Angkatan_model->get_one_type_by_name(strval($angkatan));
				$tkt_pddk_obj = $this->Tktpddk_model->get_one_type_by_name($tingkat_pddk);
				$program_obj = $this->Fakultas_model->get_one_type_by_name($program_studi);
				$prov_obj = $this->Prov_model->get_one_type_by_name($provinsi);
				$kab_obj = $this->Kabkot_model->get_one_type_by_name($kab_kota);
				$pekerjaan_obj = $this->Pekerjaan_model->get_one_type_by_name($pekerjaan);
				$keahlian_obj = $this->Keahlian_model->get_one_type_by_name($keahlian);
				// $stats = true;
				$stats = "";
				if ($name != "") {
					$num++;
					if ($nrp == "") {
						$stats = "<red>Invalid, NRP/NIM harus diisi.</red>";
					} else if ($tempat_lahir == "") {
						$stats = "<red>Invalid, Tempat lahir harus diisi.</red>";
					} else if ($tanggal_lahir == "") {
						$stats = "<red>Invalid, Tanggal lahir harus diisi.</red>";
					} else if ($sex != "M" && $sex != "F") {
						$stats = "<red>Invalid, jenis kelamin harus M/F.</red>";
					} else if ($status_hidup != "Ya" && $status_hidup != "Tidak") {
						$stats = "<red>Invalid, status hidup harus 1/0.</red>";
					} else if ($angkatan_obj == null) {
						$stats = "<red>Invalid, angkatan tidak ditemukan.</red>";
					} else if ($tkt_pddk_obj == null) {
						$stats = "<red>Invalid, tingkat pendidikan htidak ditemukan.</red>";
					} else if ($program_obj == null) {
						$stats = "<red>Invalid, program studi tidak ditemukan.</red>";
					} else if ($prov_obj == null) {
						$stats = "<red>Invalid, provinsi tidak ditemukan.</red>";
					} else if ($kab_obj == null) {
						$stats = "<red>Invalid, kab/kota tidak ditemukan.</red>";
					} else if ($pekerjaan_obj == null) {
						$stats = "<red>Invalid, pekerjaan tidak ditemukan.</red>";
					} else if ($keahlian_obj == null) {
						$stats = "<red>Invalid, keahlian tidak ditemukan.</red>";
					} else {
						$alumni_obj = $this->Cert_type_model->get_one_type_by_nrp($nrp);


						if ($alumni_obj == null) {
							$data = array(
											'nama' => $name,
											'nrp_nim' => $nrp,
											'angkatan' => $angkatan,
											'sex' => $sex,
											'email' => $email,
											'program_studi' => $program_studi,
											'no_hp' => $no_hp,
											'pekerjaan' => $pekerjaan,
											'pekerjaan_lainnya' => $pekerjaan_lainnya,
											'keahlian' => $keahlian,
											'keahlian_lainnya' => $keahlian_lainnya,
											'province_nm' => $prov_obj->prov_id,
											'kabkota_nm' => $kab_obj->kabkot_id,
											'tkt_pddk' => $tingkat_pddk,
											'status_hidup' => ($status_hidup == "Ya" ? 1 : 0),
											'last_update' => date("Y-m-d H:i:s"),
											'tempat_lahir' => $tempat_lahir,
											'tanggal_lahir' => date("Y-m-d", strtotime($tanggal_lahir)),
											'tanggal_masuk' => $tahun_masuk,
											'tanggal_selesai' => $tahun_selesai
										);
							$this->Cert_type_model->add($data);
							$stats = "<green>Valid Add</green>";
							$scsNum++;
						} else {
							$data = array(
											'nama' => $name,
											'nrp_nim' => $nrp,
											'angkatan' => $angkatan,
											'sex' => $sex,
											'email' => $email,
											'program_studi' => $program_studi,
											'no_hp' => $no_hp,
											'pekerjaan' => $pekerjaan,
											'pekerjaan_lainnya' => $pekerjaan_lainnya,
											'keahlian' => $keahlian,
											'keahlian_lainnya' => $keahlian_lainnya,
											'province_nm' => $prov_obj->prov_id,
											'kabkota_nm' => $kab_obj->kabkot_id,
											'tkt_pddk' => $tingkat_pddk,
											'status_hidup' => ($status_hidup == "Ya" ? 1 : 0),
											'last_update' => date("Y-m-d H:i:s"),
											'tempat_lahir' => $tempat_lahir,
											'tanggal_lahir' => date("Y-m-d", strtotime($tanggal_lahir)),
											'tanggal_masuk' => $tahun_masuk,
											'tanggal_selesai' => $tahun_selesai
										);
							$this->Cert_type_model->update($alumni_obj->alumniid, $data);
							$stats = "<green>Valid Update</green>";
							$scsNum++;
						}
					}

					$html .= "<tr>
		                  <td align='center'>".$num.".</td>
		                  <td>".$name."</td>
		                  <td>".$nrp."</td>
		                  <td>".$tempat_lahir."</td>
		                  <td>".$tanggal_lahir."</td>
		                  <td>".$angkatan."</td>
		                  <td>".$sex."</td>
		                  <td>".$tahun_masuk."</td>
		                  <td>".$tahun_selesai."</td>
		                  <td>".$tingkat_pddk."</td>
		                  <td>".$program_studi."</td>
		                  <td>".$provinsi."</td>
		                  <td>".$kab_kota."</td>
						  <td>".$no_hp."</td>
						  <td>".$email."</td>
						  <td>".$pekerjaan."</td>
						  <td>".$keahlian."</td>
						  <td>".$pekerjaan_lainnya."</td>
						  <td>".$keahlian_lainnya."</td>
						  <td>".$status_hidup."</td>
						  <td>".$stats."</td>
	                  </tr>";
	              }

					// if ($stats)
			}
			$html .= "</tbody>";
	        $data['content'] = $html;
	        $data['num'] = $scsNum;
	        $data['all'] = $num;
	        
			// redirect(site_url("Product"));
			$this->load->view("Confirm_view", $data);
		}
	}


}