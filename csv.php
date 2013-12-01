<?php
ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

session_start();

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';
include 'includes/defs.php';

$currentUser = checkLogin(true);

$smarty = new Smarty;
$series = getCurrentSeries(getInputData('current_series_id'));

$type = (in_array(getInputData('t'), array("re", "ry", "spy", "spe", "soy", "soe", "miy", "sid"))) ? getInputData('t') : "re";

list($headers, $data) = setSmarty($smarty, $type, $series);

$filename = getFilename($series, $type);

header('Content-Type: text/raw; charset=utf-8');
//print('filename='.$filename.'.csv');
header('Content-Disposition: attachment; filename='.$filename.'.csv');


$smarty->assign("data",$data);
$smarty->assign("headers",$headers);

$smarty->display("csv.tpl");

function setSmarty($smarty, $type, $series)
{
	$headers = array("Header","Header","Header");
	$data = array(array("d1","d1","d2"));


	if($type == "re")
	{
		list($headers, $data) = getRifleSeriesCSV($series);
	}
	elseif($type == "ry")
	{
		$year = date("Y",strtotime($series['date_started']));
		list($headers, $data) = getRifleYearlyCSV($year);
	}
	elseif($type == "spe")
	{
		list($headers, $data) = getSeriesPointsShootersCSV($series);
	}
	elseif($type == "spy")
	{
		$year = date("Y",strtotime($series['date_started']));
		list($headers, $data) = getYearlyPointsShootersCSV($year);
	}
	elseif($type == "soe")
	{
		list($headers, $data) = getSeriesOverallShootersCSV($series);
	}
	elseif($type == "soy")
	{
		$year = date("Y",strtotime($series['date_started']));
		list($headers, $data) = getYearlyOverallShootersCSV($year);
	}
	elseif($type == "miy")
	{
		$year = date("Y",strtotime($series['date_started']));
		list($headers, $data) = getMostImprovedDataDump($year);
	}
	return array($headers, $data);
}

function getFilename($series, $type)
{
	if($type == "re")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "rifle_scores_s".$series['snumber']."_$year";
	}
	elseif($type == "ry")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "rifle_scores_$year";
	}
	elseif($type == "spe")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "pistol_points_s".$series['snumber']."_$year";
	}
	elseif($type == "spy")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "pistol_points_$year";
	}
	elseif($type == "soe")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "pistol_overall_s".$series['snumber']."_$year";
	}
	elseif($type == "soy")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "pistol_overall_$year";
	}
	elseif($type == "miy")
	{
		$year = date("Y",strtotime($series['date_started']));
		$filename = "most_improved_datadump_$year";
	}
	return $filename;
}
?>