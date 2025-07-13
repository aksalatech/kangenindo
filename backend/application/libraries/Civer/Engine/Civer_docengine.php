<?php
class Civer_docengine 
{
	var $url;
	var $template;
	var $param = array();
	var $response;
	public function __construct($engineUrl)
	{
		$this->url = $engineUrl;
	}

	public function setEngineUrl($engineUrl)
	{
		$this->url = $engineUrl;
	}

	public function load($path)
	{
		$this->template = $path;
	}

	public function assign($key, $value)
	{
		$this->param[$key] = $value;
	}

	public function getEncodedTemplate()
	{
		$file = file_get_contents($this->template);
		return base64_encode($file);
	}

	public function postParam()
	{
		$str = "";
		$i = 0;
		$json = json_encode($this->param);
		return "template=".rawurlencode($this->getEncodedTemplate())."&value=".$json;
	}

	public function execute()
	{
		$file = file_get_contents($this->template);
		$byte = base64_encode($file);
		$this->response = $this->do_post($this->url, $this->postParam(), "Content-type: application/x-www-form-urlencoded\r\n");
	}

	public function do_post($url, $data, $optional_headers = null)
	{
		$params = array('http' => array(
			'method' => 'POST',
			'content' => $data
			));
		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}
		$ctx = stream_context_create($params);
		$fp = @fopen($url, 'rb', false, $ctx);
		if (!$fp) {
			throw new Exception("Problem with $url, $php_errormsg");
		}
		$response = @stream_get_contents($fp);
		if ($response === false) {
			throw new Exception("Problem reading data from $url, $php_errormsg");
		}
		return $response;
	}

	public function saveAs($path)
	{
		$file = base64_decode($this->response);
		file_put_contents($path, $file);
		return $path;
	}

	public function __destruct()
	{

	}
}