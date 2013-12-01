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

$selectedTab = (in_array(getInputData('t'), array("w","e","y"))) ? getInputData('t') : "w";

$template = getPrintView($selectedTab, $series, $smarty);

$smarty->display("prints/".$template.".tpl");

function getPrintView($tab, $current_series, $smarty)
{
	switch ($tab) {
		case 'w':
			$weekNumber = getInputData("week");

			list($maleWed, $maleFri, $weekNumber, $wed, $fri) = getWeeklyStats($current_series, $weekNumber, true);
			$weekNumber++;
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

			$template = "weekly";

			$date1 = date("M j", strtotime($wed));
			$date2 = date("M j", strtotime($fri));
			$header = "Week $weekNumber <br/> $date1 - $date2";

			$smarty->assign("series", $current_series);
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
		case 'e':
			$seriesYear = date("Y",strtotime($current_series['date_started']));

			$header = "Series ".$current_series['snumber'].", $seriesYear";
			$template = "endSeries";

			$smarty->assign("header", $header);
			$smarty->assign("stats", getSeriesStats($current_series));

			$smarty->assign("maleAgg", getSeriesPointWinners($current_series, true, true));
			$smarty->assign("femaleAgg", getSeriesPointWinners($current_series, false, true));
			
			$smarty->assign("maleTop", getTopShotSeries($current_series, true, true));
			$smarty->assign("femaleTop", getTopShotSeries($current_series, false, true));

			$smarty->assign("maleOverall", getSeriesOverall($current_series, true));
			$smarty->assign("femaleOverall", getSeriesOverall($current_series, false));
			break;
		case 'y':
			$current_year = date("Y",strtotime($current_series['date_started']));
			$header = $current_year;
			$template = "endYear";

			$smarty->assign("header", $header);

			$smarty->assign("stats", getYearlyStats($current_year));

			$smarty->assign("aggArray", getYearlySummary($current_year, true));

			$maleAgg = array('css' => 'male', 'title' => 'Male', 'results' => getYearlyAgg($current_year, true, true));
			$femaleAgg = array('css' => 'female', 'title' => 'Female', 'results' => getYearlyAgg($current_year, false, true));

			$smarty->assign("aggAll", array($maleAgg, $femaleAgg));

			$maleOverall = array('css' => 'male', 'title' => 'Male', 'results' => getYearlyOverall($current_year, true, true));
			$femaleOverall = array('css' => 'female', 'title' => 'Female', 'results' => getYearlyOverall($current_year, false, true));

			$smarty->assign("yearOverall", array($maleOverall, $femaleOverall));

			break;
	}

	return $template;
}
?>