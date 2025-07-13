<?php
class Civer_date
{
	public function __construct()
	{

	}

	public function getMonth($x)
	{
		$month = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		return $month[$x-1];
	}
	
	public function formatDate($x)
	{
		return date('d',strtotime($x)).' '.$this->getMonth(date('m',strtotime($x))).' '.date('Y',strtotime($x));
	}
	
	public function format($x, $mode = 1)
	{
		$str=explode(",",$x);
		$mid=explode(" - ",$str[1]);
		$thn=explode(" ",$str[2]);
		return ($mode == 1) ? ucfirst(strtolower($str[0]))." - ".ucfirst(strtolower($mid[1]))." ".$thn[1] : strtoupper($str[0])." - ".strtoupper($mid[1])." ".$thn[1];
	}
	
	public function format_period($date)
	{
		$month1=substr($date,0,2);
		$month2=substr($date,2,2);
		$year=substr($date,4,4);
		
		$mon1=$this->getMonth($month1);
		$mon2=$this->getMonth($month2);
		
		return ucwords($mon1." - ".$mon2." ".$year);
	}

	public function periodToIndex($period)
	{
		$month = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		
		$p = explode(" - ",$period);
		$y = explode(" ",$p[1]);
		$mon1 = str_pad(array_search($p[0], $month)+1,2,"0",STR_PAD_LEFT);
		$mon2 = str_pad(array_search($y[0], $month)+1,2,"0",STR_PAD_LEFT);
		$year = $y[1];
		return ($mon1.$mon2.$year == "") ? $period : $mon1.$mon2.$year;
	}

	public function convertPeriodeToArray($res)
	{
		$arr = array();
		while ($row = mssql_fetch_object($res)) {
			$row->full_periode = $this->format_period($row->periode);
			array_push($arr, $row);
		}
		return $arr;
	}

	public function __destruct()
	{

	}
}