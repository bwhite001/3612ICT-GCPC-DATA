<?php

function getSeriesStats($series)
{
	$sid = $series['id'];

	$pistolMatches = getSqlCount("SELECT * FROM scores where series_id = $sid");
	$rifleMatches = getSqlCount("SELECT * FROM rifle_scores where series_id = $sid");

	$pistolShooters = getSqlCount("SELECT * FROM scores where series_id = $sid GROUP BY shooter_id");
	$rifleShooters = getSqlCount("SELECT * FROM rifle_scores where series_id = $sid GROUP BY shooter_id");
	$bothShooters = getSqlCount("SELECT * FROM scores, rifle_scores WHERE  `scores`.series_id = $sid AND `rifle_scores`.series_id = $sid AND `rifle_scores`.shooter_id = `scores`.shooter_id GROUP BY `scores`.shooter_id");

	$maleShooters = getSqlCount("SELECT * FROM scores where series_id = $sid and shooter_id in (SELECT id FROM `shooters` WHERE male = true)GROUP BY shooter_id");
	$femaleShooters = getSqlCount("SELECT * FROM scores where series_id = $sid and shooter_id in (SELECT id FROM `shooters` WHERE male = false)GROUP BY shooter_id");
	$juniorsShooters = getSqlCount("SELECT * FROM scores where series_id = $sid and shooter_id in (SELECT id FROM `shooters` WHERE senior = false)GROUP BY shooter_id");

	$maleScores = getSqlCount("SELECT * FROM scores where series_id = $sid and shooter_id in (SELECT id FROM `shooters` WHERE male = true)");
	$femaleScores = getSqlCount("SELECT * FROM scores where series_id = $sid and shooter_id in (SELECT id FROM `shooters` WHERE male = false)");

	return returnData($pistolMatches,$rifleMatches,$pistolShooters,$rifleShooters,$bothShooters,$maleShooters,$femaleShooters,$juniorsShooters, $maleScores, $femaleScores);
}
function getYearlyStats($year)
{

	$pistolMatches = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year)");
	$rifleMatches = getSqlCount("SELECT * FROM rifle_scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year)");

	$pistolShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) GROUP BY shooter_id");
	$rifleShooters = getSqlCount("SELECT * FROM rifle_scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) GROUP BY shooter_id");
	$bothShooters = getSqlCount("SELECT * FROM scores, rifle_scores WHERE  `scores`.series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) AND `rifle_scores`.series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) AND `rifle_scores`.shooter_id = `scores`.shooter_id GROUP BY `scores`.shooter_id");

	$maleShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = true) GROUP BY shooter_id");
	$femaleShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = false) GROUP BY shooter_id");
	$juniorsShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE senior = false)GROUP BY shooter_id");

	$maleScores = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = true)");
	$femaleScores = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = false)");

	return returnData($pistolMatches,$rifleMatches,$pistolShooters,$rifleShooters,$bothShooters,$maleShooters,$femaleShooters,$juniorsShooters, $maleScores, $femaleScores);
}

function returnData($pistolMatches,$rifleMatches,$pistolShooters,$rifleShooters,$bothShooters,$maleShooters,$femaleShooters,$juniorsShooters, $maleScores, $femaleScores)
{
	$totalShooters = $pistolShooters + $rifleShooters - $bothShooters;

	$totalPistolShots = 60*$maleScores + 40*$femaleScores;
	$totalRifleShots = $rifleMatches*30;

	$totalPistolCards = 12*$maleScores + 8*$femaleScores;
	$totalRifleCards = $rifleMatches*3;

	$mfj = array($maleShooters, $femaleShooters, $juniorsShooters);
	$prb = array($pistolShooters,$rifleShooters,$bothShooters);

	$matches = array($pistolMatches,$rifleMatches);

	$shots = array($totalPistolShots,$totalRifleShots);
	$cards = array($totalPistolCards,$totalRifleCards);

	$output = array('total' => $totalShooters, 'prb' => $prb, 'mfj' => $mfj, 'matches' => $matches, 'shots' => $shots, 'cards' => $cards);

	return $output;
}
?>