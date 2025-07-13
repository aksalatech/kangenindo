<?php

// Limit String
function limit_str($x, $len)
{
	if (strlen($x)>$len)
	{
		return substr($x,0,$len-3)."...";
	}
	else
	{
		return $x;
	}
}
function get_url($path, $x) {
	return (strpos($path, "data:image") !== false) ? $path : $x;
}
function issetValueNull($mixed)
{
	return ($mixed != null) ? $mixed : "-";
}

function issetValueNullDate($mixed)
{
	return ($mixed != null) ? date('d M Y', strtotime($mixed)) : "-";
}

function issetValueNullDateEdit($mixed)
{
	return ($mixed != null) ? date('Y-m-d', strtotime($mixed)) : "";
}