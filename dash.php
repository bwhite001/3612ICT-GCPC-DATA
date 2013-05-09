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

$all_series = getArray("series","");

$selectedTab = (in_array(getInputData('t'), array("n", "s", "e", "p","r","a", "sa", "se", "ea", "ee")))? getInputData('t') : "s";

$error_is_good = getInputData('error_is_good');
$error_string = getInputData('error_string');

if(getInputData("uri_re") == "")
{
	$currentGetPrams = ($_SERVER['QUERY_STRING'] == "") ? "" : "?".$_SERVER['QUERY_STRING'];
	$uri = urlencode("dash.php".$currentGetPrams);
}
else
{
	$uri = getInputData("uri_re");
}


$template = sendDataToSmarty($navbar, $smarty, $selectedTab, $all_series);

$smarty->assign("error_string", $error_string);
$smarty->assign("error_is_good", $error_is_good);

$smarty->assign("current_uri", $uri);

$smarty->assign("currentUser", $currentUser);
$smarty->assign("current_series", $series);
$smarty->assign("all_series", $all_series);

$smarty->display("dashboardTabs/".$template.".tpl");

function sendDataToSmarty($navbar, $smarty, $tab, $all_series)
{

	$template = $navbar[$tab]['link'];
	#For Pistol Weeks and Rifle Weeks
	if($tab == "p" || $tab == "r")
	{
		if(count($all_series) <= 0)
		{
			redirectToUrl("dash.php", array('error_string' => "Please Create a Series!", 'error_is_good' => 'false'));
		}	
	}
	#for Shooter Add and Edit
	if($tab == "sa" || $tab == "se")
	{
		$goBack = (getInputData('backurl') == "") ? "dash.php?t=s" : getInputData('backurl');

		$smarty->assign("goBack", $goBack);

		$type = ($tab == "sa") ? "Add" : "Edit";

		$smarty->assign("type", $type);
	}
	#For Series Add and Edit
	else if($tab == "ea" || $tab == "ee")
	{
		$goBack = (getInputData('backurl') == "") ? "dash.php?t=e" : getInputData('backurl');

		$smarty->assign("goBack", $goBack);

		$type = ($tab == "ea") ? "Add" : "Edit";

		$smarty->assign("type", $type);
	}
	switch ($tab) {
		#new User Account
		case "n":
			$template = "newAccount";
			break;
		#shooters
		case 's':
			$navbar[$tab]['selected'] = 1;
			$query = getInputData('query');
			$currentPage = (getInputData('page') == "") ? "1" : getInputData('page');
			$currentLetter = (ctype_alpha(strtoupper(getInputData('letter')))) ? strtoupper(getInputData('letter')) : "A";
			list($shooters, $shooterLetters, $currentPage, $totalPages) = getShooters($query, $currentLetter, $currentPage);
			$smarty->assign("currentLetter", $currentLetter);
			$smarty->assign("query", $query);
			$smarty->assign("currentPage", $currentPage);
			$smarty->assign("totalPages", $totalPages);
			$smarty->assign("shooterLetters", $shooterLetters);
			$smarty->assign("shooters", $shooters);
			break;
		case 'e':
			$navbar[$tab]['selected'] = 1;
			$currentYear = getInputData("year");
			
			$currentPage = (getInputData('page') == "") ? "1" : getInputData('page');

			list($allYears, $allSeries, $currentYear, $currentPage, $totalPages) = getSerieses($currentYear, $currentPage);

			$smarty->assign("allYears", $allYears);
			$smarty->assign("allSeries", $allSeries);
			$smarty->assign("currentYear", $currentYear);
			$smarty->assign("currentPage", $currentPage);
			$smarty->assign("totalPages", $totalPages);
			break;
		case 'p':
			$navbar[$tab]['selected'] = 1;
			break;
		case 'r':
			$navbar[$tab]['selected'] = 1;
			break;
		#shooter Edit;
		case 'se':
			$navbar["s"]['selected'] = 1;

			$shooter = getShooter(getInputData('id'));

			if($shooter == "-1") {
				redirectToUrl("dash.php?t=s", array('error_string' => "Shooter Does Not exist!", 'error_is_good' => 'false'));
				exit;
			}

			$smarty->assign("shooter", $shooter);
			$template = "shooters/shooterForm";
			break;
		#shooter Add;
		case 'sa':
			$navbar["s"]['selected'] = 1;
			$template = "shooters/shooterForm";
			break;
		#Series Add;
		case 'ea':
			$navbar["e"]['selected'] = 1;
			$template = "series/seriesForm";
			break;
		#Series Update
		case 'ee':
			$navbar["e"]['selected'] = 1;

			$series = getSeries(getInputData('id'));

			if($series == "-1") {
				echo redirectToUrl("dash.php?t=e", array('error_string' => "Series Does Not exist!", 'error_is_good' => 'false'));
				exit;
			}
			$smarty->assign("series", $series);

			$template = "series/seriesForm";
			break;
	}

	$smarty->assign("navbar", $navbar);

	return $template;
}
?>
