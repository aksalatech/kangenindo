<?php
class Civer_validate
{
	public function __construct()
	{

	}

	public function chk_null_num($x)
	{
		return (!isset($x) || $x == "") ? 0 : $x; 
	}

	//Function for checking email
	public function check_email($email)
	{
		if (!ereg("^.+@.+\..+$",$email))
			return false;
		else
			return true;
	}

	public function chk_alnum($str)
	{
		$alpha = 0;
		$num = 0;
		for($i =0 ; $i<strlen($str); $i++) {
			if (is_numeric($str[$i])) {
				$num++;
			} else {
				$alpha++;
			}
		}

		return ($alpha > 0 && $num > 0) ? true : false;
	}

	public function __destruct()
	{

	}
}