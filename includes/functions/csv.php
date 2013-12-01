<?php

function getRifleSeriesCSV($current_series)
{
	$matchTitles = array('0' => "Unsupported", '1' => 'Supported', '2' => "Bench");

	$headers = array("Name", "M-F-J","Date", "Match", "Score");
	$data = array();

	$sql = "SELECT * FROM rifle_scores WHERE series_id = ".$current_series['id'];

	$results = getArray("-1", $sql);

	foreach ($results as $score) {
		$shooter = getShooter($score['shooter_id']);

		$name = strtoupper($shooter['lastname']).", ".$shooter['firstname'];

		$mfj = ($shooter['male']) ? "M" : "F";
		$mfj = ($shooter['senior']) ? $mfj : "J";

		$match = $matchTitles[$score['match']];

		$csvLine = array($name, $mfj, $score['date'], $match, $score['score']);

		$data[] = $csvLine;
	}

	return array($headers, $data);
}
function getRifleYearlyCSV($year)
{
	$matchTitles = array('0' => "Unsupported", '1' => 'Supported', '2' => "Bench");

	$headers = array("Name", "M-F-J","Series", "Date", "Match", "Score");
	$data = array();

	$year = sanitiseMyStringNow($year);

	$yearSql = "SELECT id FROM `series` WHERE YEAR(date_started) = $year";

	$sql = "SELECT * FROM rifle_scores WHERE series_id in ($yearSql)";

	$results = getArray("-1", $sql);

	foreach ($results as $score) {
		$series = getSeries($score['series_id']);
		$shooter = getShooter($score['shooter_id']);

		$name = strtoupper($shooter['lastname']).", ".$shooter['firstname'];

		$mfj = ($shooter['male']) ? "M" : "F";
		$mfj = ($shooter['senior']) ? $mfj : "J";

		$match = $matchTitles[$score['match']];

		$csvLine = array($name, $mfj,$series['snumber'], $score['date'], $match, $score['score']);

		$data[] = $csvLine;
	}

	return array($headers, $data);
}
function getYearlyPointsShootersCSV($year)
{
	$array1 = getYearlyAgg($year, true, false);
	$array2 = getYearlyAgg($year, false, false);
	$results = array($array2, $array1);

	return pistolPointsCSV($results);
}

function getSeriesPointsShootersCSV($series)
{
	$array1 = getSeriesPointWinners($series, true, false);
	$array2 = getSeriesPointWinners($series, false, false);
	$results = array($array2, $array1);

	return pistolPointsCSV($results);
}

function getYearlyOverallShootersCSV($year) 
{
	$array1 = getYearlyOverall($year, true);
	$array2 = getYearlyOverall($year, false);
	$results = array($array2, $array1);

	return pistolOverallCSV($results);
}
function getSeriesOverallShootersCSV($series)
{
	$array1 = getSeriesOverall($series, true);
	$array2 = getSeriesOverall($series, false);
	$results = array($array2, $array1);

	return pistolOverallCSV($results);
}

function pistolPointsCSV($results)
{
	$headers = array("Name", "M-F", "J","High Score","Date", "Match Count", "Total Points");

	$data = array();

	foreach ($results as $result) {
		foreach ($result as $score) {

			$shooter = getShooter($score['shooter_id']);
			$name = strtoupper($shooter['lastname']).", ".$shooter['firstname'];
			$id = $shooter['id'];

			$mf = ($shooter['male']) ? "M" : "F";

			$j = ($shooter['senior']) ? "" : "J";
			
			$csvLine = array($name, $mf, $j, $score['score'], $score['date'], $score['count'], $score['points']);

			$data[] = $csvLine;
		}
	}

	return array($headers, $data);
}
function pistolOverallCSV($results)
{
	$headers = array("Name", "M-F", "J","High Score","Date", "Match Count", "AVG");

	$data = array();

	foreach ($results as $result) {
		foreach ($result as $score) {

			$shooter = getShooter($score['shooter_id']);
			$name = strtoupper($shooter['lastname']).", ".$shooter['firstname'];
			$id = $shooter['id'];

			$mf = ($shooter['male']) ? "M" : "F";

			$j = ($shooter['senior']) ? "" : "J";
			
			$csvLine = array($name, $mf, $j, $score['score'], $score['date'], $score['count'], $score['avg']);

			$data[] = $csvLine;
		}
	}

	return array($headers, $data);
}

function getMostImprovedDataDump($year)
{
	$headers = array("Name", "M-F", "J","Score","Date");
	$results = getYearlyDataDump($year);
	$data = array();

	foreach ($results as $score) {

			$shooter = getShooter($score['shooter_id']);
			$name = strtoupper($shooter['lastname']).", ".$shooter['firstname'];
			$id = $shooter['id'];

			$mf = ($shooter['male']) ? "M" : "F";

			$j = ($shooter['senior']) ? "" : "J";
			
			$csvLine = array($name, $mf, $j, $score['score'], $score['date'], $score['count'], $score['avg']);

			$data[] = $csvLine;
		}

	return array($headers, $data);
}

?>