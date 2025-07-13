<?php
require_once 'Custom_CI_Controller.php';

class Home extends Custom_CI_Controller{

	function __construct() { 
         parent::__construct();
    }

    public function logout(){
		$this->session->unset_userdata("userID");
		redirect(site_url("Login"));
    }

    // public function index() {
    //     if ($this->session->userdata("position") == POSITION_ADMIN) {
    //         redirect(site_url("home/aktivasi"));
    //     } else {
    //         $this->load->view("Home_view", $data);
    //     }

    // } 

    public function index() {
        $this->load->model("Corp_Model");
        $this->load->model("Cert_type_model");
        $data = array();
        // if($this->input->get("mode") == null){
        //     $mode="%";
        // }
        // else{
        //     $mode=$this->input->get("mode");
        // }
        // if($this->input->get("t") == null){
        //     $m="month";
        // }
        // else{
        //     $m=$this->input->get("t");
        // }
        // if ($this->input->get("sd")==null) {
        //     $sd = "2020-01-01";     
        // }
        // else{
        //     $sd = $this->input->get("sd");
        // }

        // if ($this->input->get("ed")==null) {
        //     $ed = date('Y-m-d', strtotime("+1 days"));  
        // }
        // else{
        //     $ed = $this->input->get("ed");
        // }

        // if ($this->input->get("group")==null) {
        //     $group = "Provinsi";  
        // }
        // else{
        //     $group = $this->input->get("group");
        // }
        // $data["param"] = $m;
        // $data["mode"] = $mode;
        // $data["group"] = $group;
        // $data["perso_count"] = $this->Corp_Model->getTotalAccounts($sd, $ed);
        // $data["cert_count"] = $this->Corp_Model->getTotalProvinsi($sd, $ed);
        // $data["qr_count"] = $this->Corp_Model->getTotalMaleAccounts($sd, $ed);
        // $data["ikd_count"] = $this->Corp_Model->getTotalFemaleAccounts($sd, $ed);
        // $data["list"] = $this->Cert_type_model->get_prov_stats();
        // if ($group == "Provinsi") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerLembaga($sd, $ed);
        // else if ($group == "tkt_pddk") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerTingkatPddk($sd, $ed);
        // else if ($group == "program_studi") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerProgramStudi($sd, $ed);
        // else if ($group == "keahlian") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerKeahlian($sd, $ed);
        // else if ($group == "pekerjaan") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerPekerjaan($sd, $ed);
        // else if ($group == "angkatan") 
        //     $data["ikd_all"] = $this->Corp_Model->getTotalPerAngkatan($sd, $ed);

        // $data["mapChart"] = json_encode($this->Corp_Model->getTotalPerRegion($sd, $ed), JSON_NUMERIC_CHECK);
        // $data["mapChart2"] = json_encode($this->Corp_Model->getTotalPerRegion2($sd, $ed), JSON_NUMERIC_CHECK);

        // // print_r($data['mapChart']);
        // // $data["cert_new"] = $this->Corp_Model->getTotalNonAktivasi($sd, $ed);
        // // // $data["cert_pusat"] = $this->Corp_Model->getTotalAktivasiPemanfaatanPusat($sd, $ed); 
        // // $data["no_urut"] = $this->Corp_Model->getLastNoUrut();
        // // $data["perso_rw"] = $this->Corp_Model->getTotalPersoRW($sd, $ed);
        // // // $data["cert_pending"] = $this->Corp_Model->getTotalAktivasiPemanfaatan(1, $sd, $ed);

        // // $data["cert_apv"] = $this->Corp_Model->getTotalAktivasiPemanfaatan($sd, $ed);
        // // $data["aktivasi_pengguna"] = $this->Corp_Model->getCountAktivasiPencetakanPengguna($sd, $ed);
        // // // $data["cert_rejected"] = $this->Corp_Model->getRequestCard($mode, 'F', 0, $sd, $ed);
        // $tr = $this->Corp_Model->get_monthly_log();
        // $data["monthly_trans"] = json_encode($tr["total"], JSON_NUMERIC_CHECK);
        // $data["apv"] = json_encode($tr["apv"],JSON_NUMERIC_CHECK);
        // $data["rjc"] = json_encode($tr["rjc"],JSON_NUMERIC_CHECK);
        // $data["cnt"] = json_encode($tr["cnt"],JSON_NUMERIC_CHECK);
        // $data['timeStamp']=json_encode($tr["time"]);
        // // $data["yearly_perso"] = $this->Corp_Model->get_yearly_perso($sd, $ed);
        // // // $data["yearly_aktivasi"] = $this->Corp_Model->get_yearly_activation($sd, $ed);
        // // $data["top_landing"] = $this->Corp_Model->get_top_landing(20, $sd, $ed);
        // // // $data["top_qr"] = $this->Corp_Model->get_top_qr(20, $sd, $ed);
        // // $data["top_qrikd"] = $this->Corp_Model->get_top_qrikd(20, $sd, $ed);

        // // $data["dukcapil_prov_cetak"] = $this->Corp_Model->getTotalAktivasiPencetakkanDkcplProv($sd, $ed);
        // // $data["dukcapil_kabkot_cetak"] = $this->Corp_Model->getTotalAktivasiPencetakkanDkcplKabKot($sd, $ed);
        // // $data["dukcapil_prov_read"] = $this->Corp_Model->getTotalAktivasiPemanfaatanDkcplProv($sd, $ed);
        // // $data["dukcapil_kabkot_read"] = $this->Corp_Model->getTotalAktivasiPemanfaatanDkcplKabKot($sd, $ed);
        // // $data['pengguna_pusat'] = $this->Corp_Model->getCountAktivasiPemanfaatanPenggunaPusat($sd, $ed);
        // $data["sd"] = $sd;
        // $data["ed"] = $ed;
        // $data["group"] = $this->Corp_Model->get_progress_requests();

        $this->load->view("Home_view", $data);
    }


    public function changepass(){
        $this->load->model("User_model");

        // Get Parameter
        $userID = $this->session->userdata("userID");

        // Get Data
        $data["user"] = $this->User_model->get_all_user_by_id($userID);

    	$this->load->view("Change_pass_view", $data);
    }

    public function submitpass() {
        $this->load->model("User_model");

        // Get Parameter
        $userID = $this->session->userdata("userID");
        $oldpass = $this->input->post("oldpass");
        $newpass = $this->input->post("newpass");
        $confirm = $this->input->post("confirm");

        $data = array();
        $err = "";
        $users = $this->User_model->get_all_user_id($userID);

        // Get Data
        $data["user"] = $this->User_model->get_all_user_by_id($userID);
        
        if ($oldpass == "") {
            $err = "Old password must be filled !";
        } else if ($newpass == "") {
            $err = "New password must be filled !";
        } else if ($confirm == "") {
            $err = "Confirmation must be filled !";
        } else if ($users->password != sha1($oldpass)) {
            $err = "Old password does not match!";
        } else if ($newpass != $confirm) {
            $err = "New password and confirmation do not match";
        } else {
            $col = array("password" => sha1($newpass));
            $this->User_model->update($col, $userID);
            $err = "Password has been changed successfully !";
        }
        if ($err != "") {
            $data["err"] = $err;
            $this->load->view("Change_pass_view", $data);
        }
    }

    public function profile() {
        // Get Model
        $this->load->model("User_model");

        // Get Parameter
        $userID = $this->session->userdata("userID");

        // Get Data
        $data["user"] = $this->User_model->get_all_user_by_id($userID);

        $this->load->view("Profile_view", $data);
    }

    public function save_profile() {
        // Get Model
        $this->load->model("User_model");

        // Get Parameter
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $notelp = $this->input->post("notelp");
        $alamat = $this->input->post("alamat");

        $data = array("employee_name" => $name,
                      "email" => $email,
                      "phone" => $notelp,
                      "address" => $alamat);

        // Save data to Database
        $userID = $this->session->userdata("userID");
        $this->User_model->update($data, $userID);


        redirect(base_url()."home/profile");
    }

    public function get_alumni() {
        $this->load->model("Cert_type_model");

        $where = $this->input->post("where");
        $cert = $this->Cert_type_model->get_data_where($where);

        echo json_encode($cert);
    }
}