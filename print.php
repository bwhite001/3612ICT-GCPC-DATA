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

if($series == "-1")
{
	header("location: dash.php");
}	

$selectedTab = (in_array(getInputData('t'), array("w"))) ? getInputData('t') : "w";

$template = getPrintView($selectedTab, $series, $smarty);

$smarty->display("prints/".$template.".tpl");

function getPrintView($tab, $current_series, $smarty)
{
	switch ($tab) {
		case 'w':
			$weekNumber = getInputData("week");
			list($maleWed, $maleFri, $weekNumber, $wed, $fri) = getWeeklyStats($current_series, $weekNumber, true);
			list($femaleWed, $femaleFri) = getWeeklyStats($current_series, $weekNumber, false);

			list($maleWinners) = getWeekPointsWinners($current_series, $weekNumber, true, true);
			list($femaleWinners) = getWeekPointsWinners($current_series, $weekNumber, false, true);
			if((count($maleWed) + count($maleFri)) > 0)
				$maleTS = getWeeklyTopShot($current_series, $weekNumber, true);
			else
			{

				$maleTS['name'] = "No Male Shooters";
				$maleTS['score'] = "N/A";
			}
			if((count($femaleWed) + count($femaleFri)) > 0)
				$femaleTS = getWeeklyTopShot($current_series, $weekNumber, false);
			else
			{

				$femaleTS['name'] = "No Female Shooters";
				$femaleTS['score'] = "N/A";
			}

			$weekNumber++;

			$template = "weekly";

			$date1 = date("M j", strtotime($wed));
			$date2 = date("M j", strtotime($fri));
			$header = "Week $weekNumber <br/> $date1 - $date2";

			$smarty->assign("header", $header);

			$smarty->assign("maleWed", $maleWed);
			$smarty->assign("maleFri", $maleFri);

			$smarty->assign("femaleWed", $femaleWed);
			$smarty->assign("femaleFri", $femaleFri);

			$smarty->assign("maleWinners", $maleWinners);
			$smarty->assign("femaleWinners", $femaleWinners);

			$smarty->assign("maleTS", $maleTS);
			$smarty->assign("femaleTS", $femaleTS);

			$smarty->assign("wed", $date1);
			$smarty->assign("fri", $date2);

			break;
	}

	return $template;
}
?>