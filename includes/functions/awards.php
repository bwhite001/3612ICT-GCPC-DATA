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

	$totalShooters = $pistolShooters + $rifleShooters - $bothShooters;

	$totalPistolShots = 60*$maleShooters + 40*$femaleShooters;
	$totalRifleShots = $rifleShooters*30;

	$totalPistolCards = 12*$maleShooters + 8*$femaleShooters;
	$totalRifleCards = $rifleShooters*3;

	$mfj = array($maleShooters, $femaleShooters, $juniorsShooters);
	$prb = array($pistolShooters,$rifleShooters,$bothShooters);

	$matches = array($pistolMatches,$rifleMatches);

	$shots = array($totalPistolShots,$totalRifleShots);
	$cards = array($totalPistolCards,$totalRifleCards);

	$output = array('total' => $totalShooters, 'prb' => $prb, 'mfj' => $mfj, 'matches' => $matches, 'shots' => $shots, 'cards' => $cards);

	return $output;
}
function getYearlyStats($year)
{

	$pistolMatches = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year)");
	$rifleMatches = getSqlCount("SELECT * FROM rifle_scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year)");

	$pistolShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) GROUP BY shooter_id");
	$rifleShooters = getSqlCount("SELECT * FROM rifle_scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) GROUP BY shooter_id");
	$bothShooters = getSqlCount("SELECT * FROM scores, rifle_scores WHERE  `scores`.series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) AND `rifle_scores`.series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) AND `rifle_scores`.shooter_id = `scores`.shooter_id GROUP BY `scores`.shooter_id");

	$maleShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = true)GROUP BY shooter_id");
	$femaleShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE male = false)GROUP BY shooter_id");
	$juniorsShooters = getSqlCount("SELECT * FROM scores where series_id in (SELECT id FROM `series` WHERE YEAR(date_started) = $year) and shooter_id in (SELECT id FROM `shooters` WHERE senior = false)GROUP BY shooter_id");

	$totalShooters = $pistolShooters + $rifleShooters - $bothShooters;

	$totalPistolShots = 60*$maleShooters + 40*$femaleShooters;
	$totalRifleShots = $rifleShooters*30;

	$totalPistolCards = 12*$maleShooters + 8*$femaleShooters;
	$totalRifleCards = $rifleShooters*3;

	$mfj = array($maleShooters, $femaleShooters, $juniorsShooters);
	$prb = array($pistolShooters,$rifleShooters,$bothShooters);

	$matches = array($pistolMatches,$rifleMatches);

	$shots = array($totalPistolShots,$totalRifleShots);
	$cards = array($totalPistolCards,$totalRifleCards);

	$output = array('total' => $totalShooters, 'prb' => $prb, 'mfj' => $mfj, 'matches' => $matches, 'shots' => $shots, 'cards' => $cards);

	return $output;


	// $seriesNums = getSeriesArray($year);

 //    $index = 0;

 //    foreach($seriesNums as $seriesId)
 //    {   
 //        $sid = $seriesId['id'];
 //    	$series = getSeries($sid);
 //       if($index == 0)
 //       {
 //       		$stats = getSeriesStats($series);
 //       }
 //       else
 //       {
 //       		$tmpStats = getSeriesStats($series);

 //       		$stats['total'] += $tmpStats['total'];
 //       		$stats['prb'][0] += $tmpStats['prb'][0];
 //       		$stats['prb'][1] += $tmpStats['prb'][1];
 //       		$stats['prb'][2] += $tmpStats['prb'][2];
 //       		$stats['mfj'][0] += $tmpStats['mfj'][0];
 //       		$stats['mfj'][1] += $tmpStats['mfj'][1];
 //       		$stats['mfj'][2] += $tmpStats['mfj'][2];
 //       		$stats['matches'][0] += $tmpStats['matches'][0];
 //       		$stats['matches'][1] += $tmpStats['matches'][1];
 //       		$stats['shots'][0] += $tmpStats['shots'][0];
 //       		$stats['shots'][1] += $tmpStats['shots'][1];
 //       		$stats['cards'][0] += $tmpStats['cards'][0];
 //       		$stats['cards'][1] += $tmpStats['cards'][1];
 //       }
 //       $index++;
 //    }

 //    return $stats;
}
?>