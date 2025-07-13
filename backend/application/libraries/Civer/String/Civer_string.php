<?php
class Civer_string
{
	public function __construct()
	{

	}

	public function lower($x)
	{
		return (trim($x)!="") ? strtolower(trim($x)) : "-";
	}

	public function upper($x)
	{
		return (trim($x)!="") ? strtoupper(trim($x)) : "-";
	}

	public function formatSK($x)
	{
		return ($x!="") ? ucwords($this->lower($x)) : "-";
	}

	public function __destruct()
	{

	}
}