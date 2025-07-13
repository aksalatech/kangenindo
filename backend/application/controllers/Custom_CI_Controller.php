<?php

class Custom_CI_Controller extends CI_Controller
{
	function __construct($login = true)
	{
		parent::__construct();

		if ($login) {
			if ($this->session->userdata("userID") == "" || $this->session->userdata("userID") == null) {
				redirect(site_url("login"));
			}
		} else {
			if ($this->session->userdata("userID") != "" && $this->session->userdata("userID") != null) {
				// if($this->session->userdata("otpstatus") == ""){
												
				// }else{
					redirect(site_url("home"));					
				// }
			}
		}
	}

	function isNull($x) {
		return ($x == null || $x == "") ? "-" : $x;
	}

	//Generate Token
	function generate_token($len)
	{
		$str="";
		for ($i=0;$i<$len;$i++)
		{
			if ($i%2==0)
				$str.=chr(mt_rand(48,57));
			else
			{
				if (mt_rand(0,2)==0)
					$str.=chr(mt_rand(65,91));
				else
					$str.=chr(mt_rand(97,122));
			}
		}
		return $str;
	}

	function formatFileName($x) {
		return str_replace($x, " ","_");
	}

	public function getWeekDay()
	{
		$w = date('w');
		$days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jumat', 'Sabtu');
		return $days[$w];
	}

	public function getMonth($x)
	{
		$month = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		return $month[$x-1];
	}

	public function convert_date($oldDate) {
		// Daftar nama bulan dalam bahasa Indonesia
	    $bulan = [
	        'Januari', 'Februari', 'Maret', 'April',
	        'Mei', 'Juni', 'Juli', 'Agustus',
	        'September', 'Oktober', 'November', 'Desember'
	    ];

	    // Mencari indeks nama bulan dalam teks tanggal
	    $tokens = explode(" ", $oldDate);
	    if (sizeof($tokens) == 3) {
		    $indexBulan = array_search($tokens[1], $bulan);

		    if ($indexBulan !== false) {
		        // Mengambil tanggal, tahun, dan mengonversi indeks bulan menjadi angka bulan
		        $tanggal = substr($oldDate, 0, strpos($oldDate, ' '));
		        $tahun = substr($oldDate, strrpos($oldDate, ' ') + 1);
		        $angkaBulan = str_pad($indexBulan + 1, 2, '0', STR_PAD_LEFT);

		        // Menghasilkan tanggal dalam format 'YYYY-MM-DD'
		        $newDate = $tahun . '-' . $angkaBulan . '-' . $tanggal;
		        return $newDate;
		    } else {
		        return $oldDate;
		    }
		}
		return $oldDate;
	}

	public function formatDate($x)
	{
		return date('d',strtotime($x)).' '.$this->getMonth(date('m',strtotime($x))).' '.date('Y',strtotime($x));
	}

	public function crawlSMTP($url, $sender, $name, $to, $subject, $content)
    {
        $data = array('sender' => $sender, 'name' => $name, 'sender' => $sender, "to" => $to, "subject" => $subject, "message" => $content);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { 
            echo "Error";
            var_dump($result); 
        }
        return $result;
    }

    public function crawlSMS($phone, $content)
    {
    	$newUrl = $this->config->item("smsUrl");
        $data = array("phone" => $phone, "message" => $content);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ),
            "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($newUrl, false, $context);
        echo $result;
        if ($result === FALSE) { 
            echo "Error";
            var_dump($result); 
        }
        return $result;
    }

    public function sendNotifToAdmin($subject, $content)
    {
    	$this->load->model("User_model");

    	$users = $this->User_model->get_all_user_by_position("Admin");
		foreach ($users as $u) {
			$this->crawlSMTP($this->config->item("smtpUrl"), $this->config->item("from"),$this->config->item("fromName"), $u->Email, $subject, $content);
		}
    }

    function getRandomCode($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	  
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		} 
	  
		return $randomString; 
	} 
	
	function getExpiredTimeOTP() { 
		
		$expired_otp = ''; 
	    $current = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		//The number of hours to add.
	    $hoursToAdd = 2;
	 
	//Add the hours by using the DateTime::add method in
	//conjunction with the DateInterval object.
	    $current->add(new DateInterval("PT{$hoursToAdd}H"));
	 
	//Format the new time into a more human-friendly format
	//and print it out.
	  $expired_otp = $current->format('Y-m-d H:m:s');
	  
		return $expired_otp; 
	} 

    //Generate Random String
	public function generate_random($len,$type="alnum")
	{
		$str="";
		for ($i=0;$i<$len;$i++)
		{
			if ($type=="alnum")
			{
				if ($i%2==0)
					$str.=chr(mt_rand(48,57));
				else
				{
					if (mt_rand(0,2)==0)
						$str.=chr(mt_rand(65,91));
					else
						$str.=chr(mt_rand(97,122));
				}
			}
			else if ($type=="alpha")
			{
				if (mt_rand(0,2)==0)
					$str.=chr(mt_rand(65,91));
				else
					$str.=chr(mt_rand(97,122));
			}
			else if ($type=="numeric")
			{
				$str.=chr(mt_rand(48,57));
			}
		}
		return $str;
	}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
	
}