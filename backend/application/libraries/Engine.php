<?php 
require_once 'Civer/Engine/Civer_docengine.php';

class Engine
{
	var $phpld;
	public function __construct()
	{

	}

	public function init($url, $template)
	{
		$this->phpld = new Civer_docengine($url);
		$this->phpld->load($template);
	}

	public function assign($prop, $val)
	{
		$this->phpld->assign($prop, $val);
	}

	public function execute()
	{
		$this->phpld->execute();
	}

	public function output($path)
	{
		$this->phpld->saveAs($path);
	}
} 