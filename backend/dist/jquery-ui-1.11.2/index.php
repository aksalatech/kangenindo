<?php 
	$addr = explode("/",$_SERVER['SCRIPT_NAME']);
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ) ? "https" : "http" );
	$base_url .= "://".$_SERVER['HTTP_HOST'];

	for ($i=1; $i<sizeof($addr);$i++) {
		$base_url .= "/".$addr[$i];

		if ($addr[$i] == 'public') break;
	}
	header("location:".$base_url."/error/e403");
?>