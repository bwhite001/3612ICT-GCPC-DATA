<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';
include 'includes/defs.php';

$smarty = new Smarty;

$selectedTab = (in_array(getInputData('t'), array("s", "e", "p","r","a", "sa", "se")))? getInputData('t') : "s";

$template = sendDataToSmarty($navbar, $smarty, $selectedTab);

$smarty->display("dashboardTabs/".$template.".tpl");

function sendDataToSmarty($navbar, $smarty, $tab)
{

	$template = $navbar[$tab]['link'];

	switch ($tab) {
		#shooters
		case 's':
			$navbar[$tab]['selected'] = 1;
			$query = getInputData('query');
			$currentPage = (getInputData('page') == "") ? : getInputData('page');
			$currentLetter = (ctype_alpha(strtoupper(getInputData('letter')))) ? strtoupper(getInputData('letter')) : "A";
			list($shooters, $shooterLetters, $currentPage, $totalPages) = getShooters($query, $currentLetter, $currentPage);
			$smarty->assign("currentLetter", $currentLetter);
			$smarty->assign("query", $query);
			$smarty->assign("currentPage", $currentPage);
			$smarty->assign("totalPages", $totalPages);
			$smarty->assign("shooterLetters", $shooterLetters);
			$smarty->assign("shooters", $shooters);
			break;
		case 'sa':
			$navbar["s"]['selected'] = 1;
			$template = "shooters/shooterForm";
			break;
	}

	$smarty->assign("navbar", $navbar);

	return $template;
}
?>
