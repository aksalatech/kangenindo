<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Include PHPMailer library files
require_once APPPATH.'third_party/PHPMailer/src/Exception.php';
require_once APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
require_once APPPATH.'third_party/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerLib {

	public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
              
        $mail = new PHPMailer;
        $mail->isSMTP();
        return $mail;
    }
}