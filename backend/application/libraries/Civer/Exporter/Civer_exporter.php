<?php
class Civer_exporter
{
	var $limiter;
	var $font;
	public function __construct()
	{
		$this->limiter = ";";
		$this->font = "helvetica";
	}

	public function convertJsonToCsv($json, $url, $title = "", $exp = "")
	{
		try {
			if (file_exists($url)) {
				unlink($url);
			}

			$file = fopen($url, "w");
			$data = json_decode($json);
			$limiter = "";
			$col = "";
			$val = "";
			$i = 0;
			fwrite($file, $title."\n\n");
			fwrite($file, $exp."\n\n");
			foreach ($data as $j) : 
				$limiter = "";
				$col = "";
				$val = "";
				foreach($j as $key => $value) :
					if ($i == 0){
						$col .= $limiter.strtoupper(str_replace("_", " ",$key));
					}
					$val .= $limiter.$value;
					$limiter = $this->limiter;
				endforeach;
				if ($i == 0){
					fwrite($file, $col."\n");
				}
				fwrite($file, $val."\n");
				$i++;
			endforeach;
			fclose($file);
		} catch (Zend_Exception $e) {
			echo $e->getMessage();
		}
	}

	public function convertJsonToTable($json, $title="", $exp = "")
	{
		// $html .= "<br/><br/><br/>";
		$html = "<h2 style='margin-top:50px;text-align:center;margin-bottom:2px;font-family:".$this->font.";font-size:15pt;'><u>".strtoupper($title)."</u></h2>";
		$html .= "<p style='text-align:center;font-family:".$this->font.";font-size:10pt;margin-top:0px'>".$exp."</p>";
		$html .= "<table border='1' cellpadding='10px' style='border-collapse:collapse;margin-top:35px;
					margin-left:10px;margin-right:10px;font-size:9.25pt;width:100%;font-family:".$this->font.";'>";
		$data = json_decode($json);
		$i = 0;
		foreach ($data as $j) : 
			$html .= "<tr >";
			$col = "";
			$val = "";
			foreach($j as $key => $value) :
				if ($i == 0){
					$col .= "<td style='background-color:#EEE;text-align:center;' ><strong>".ucwords(str_replace("_"," ",$key))."</strong></td>";
				}
				$val .= "<td align='center'>".$value."</td>";
			endforeach;
			if ($i == 0){
				$html .= $col;
				$html .= "</tr><tr>";
			}
			$html .= $val;
			$html .= "</tr>";
			$i++;
		endforeach;
		$html .= "</table>";
		return $html;
	}

	public function __destruct()
	{

	}
}