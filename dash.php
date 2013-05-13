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

$selectedTab = (in_array(getInputData('t'), array("phpmyadmin","n", "s", "e", "p","r","a", "sa", "se", "ea", "ee","pw","pwa", "rw", "rwa")))? getInputData('t') : "s";

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


$template = sendDataToSmarty($navbar, $smarty, $selectedTab, $all_series, $series);

$smarty->assign("error_string", $error_string);
$smarty->assign("error_is_good", $error_is_good);

$smarty->assign("current_uri", $uri);

$smarty->assign("currentUser", $currentUser);
$smarty->assign("current_series", $series);
$smarty->assign("all_series", $all_series);

$smarty->display("dashboardTabs/".$template.".tpl");

function sendDataToSmarty($navbar, $smarty, $tab, $all_series, $current_series)
{
	$template = $navbar[$tab]['link'];
	#For Pistol Weeks and Rifle Weeks
	if($tab == "p" || $tab == "r" || $tab == "pw" || $tab == "rw")
	{
		if(count($all_series) <= 0)
			redirectToUrl("dash.php", array('error_string' => "Please Create a Series!", 'error_is_good' => 'false'));
	}
	if($tab == "r" || $tab == "rw" || $tab == "rwa" || $tab == "rwe")
	{
		$matchTitles = array('0' => "Unsupported", '1' => 'Supported', '2' => "Bench");
		$smarty->assign("matchTitles", $matchTitles);
	}
	if($tab == "pw" || $tab == "rw")
	{
		$weekNumber = getInputData("week");
		$thisUrl = ($tab == "pw") ? "p" : "r";
		$table = ($tab == "pw") ? "scores" : "rifle_scores";

		$weekNumber = $weekNumber -1;
		if($weekNumber > ($current_series['length']) || $weekNumber < 0)
			redirectToUrl("dash.php?t=$thisUrl", array('error_string' => "Invalid Week Number", 'error_is_good' => 'false'));

		$day = getInputData("day");

		if($day != "w" && $day != "f")
			$day = "w";

		$type = ($tab == "pw") ? "Pistol" : "Rifle";

		if($day == "w")
			$weeklyDate = strtotime("+$weekNumber week", strtotime($current_series['date_started']));
		else
			$weeklyDate = strtotime("+2 day +$weekNumber week", strtotime($current_series['date_started']));

		$date = date("Y-m-d", $weeklyDate);
		$sql = "SELECT $table.*, CONCAT(shooters.firstname, ' ',shooters.lastname) as name, `shooters`.male AS male FROM `$table`, `shooters` WHERE `date` = '$date' and series_id = ".$current_series['id']." and`$table`.shooter_id = `shooters`.id order by `shooters`.firstname";
		$scores = getArray("-1", $sql);

		$navbar[$thisUrl]['selected'] = 1;
		$smarty->assign("thisUrl", $thisUrl);
		$smarty->assign("weekDate", $weeklyDate);

		$smarty->assign("type", $type);
		$smarty->assign("table", $table);
		$smarty->assign("scores", $scores);

		$template = "weekly";
	}
	#for Pistol Week, Rifle Week ADD
	if($tab == "pwa" || $tab == "rwa")
	{
		$date = sanitiseMyStringNow(getInputData("date"));
		$series_id = sanitiseMyStringNow(getInputData("seriesid"));
		$shooter_id = sanitiseMyStringNow(getInputData("id"));

		$thisUrl = ($tab == "pwa") ? "p" : "r";
		$table = ($tab == "pwa") ? "scores" : "rifle_scores";

		$redirect = urldecode(sanitiseMyStringNow(getInputData("backurl")));
		if($redirect == "")
			$redirect = "dash.php?t=p";

		$shooter = getShooter($shooter_id);
		if($shooter == "-1") {
			redirectToUrl($redirect, array('error_string' => "Shooter Does Not Exist!", 'error_is_good' => 'false'));
			exit;
		}
		$shooterName = $shooter['firstname']." ".$shooter['lastname'];

		$sql = "SELECT * FROM `$table` where `date` = '$date' and series_id = $series_id and shooter_id = $shooter_id;";
		if(doesExist("-1", $sql)) {
			redirectToUrl($redirect, array('error_string' => "$shooterName has already shot today!", 'error_is_good' => 'false'));
			exit;
		}

		$navbar[$thisUrl]['selected'] = 1;

		$smarty->assign("series_id", $series_id);
		$smarty->assign("shooter", $shooter);
		$smarty->assign("date", $date);


		$smarty->assign("goBack", $redirect);
		
		$smarty->assign("table", $table);
		$smarty->assign("type", "Add");

		$template = "weekly/weeklyForm";

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
	if($tab == "phpmyadmin")
	{
		$template = "pma";
	}
	$smarty->assign("navbar", $navbar);

	return $template;
}
?>
