<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';
include 'includes/defs.php';

$smarty = new Smarty;

$selectedTab = (in_array(getInputData('t'), array("s", "e", "p","r","a", "sa", "se")))? getInputData('t') : "s";

$error_is_good = getInputData('error_is_good');
$error_string = getInputData('error_string');

$template = sendDataToSmarty($navbar, $smarty, $selectedTab);

$smarty->assign("error_string", $error_string);
$smarty->assign("error_is_good", $error_is_good);

$smarty->display("dashboardTabs/".$template.".tpl");

function sendDataToSmarty($navbar, $smarty, $tab)
{

	$template = $navbar[$tab]['link'];

	#for Shooter Add and Edit
	if($tab == "sa" || $tab == "se")
	{
		$goBack = (getInputData('backurl') == "") ? "dash.php?t=s" : getInputData('backurl');

		$smarty->assign("goBack", $goBack);

		$type = ($tab == "sa") ? "Add" : "Edit";

		$smarty->assign("type", $type);
	}
	switch ($tab) {
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
		#shooter Edit;
		case 'se':
			$navbar["s"]['selected'] = 1;
			$shooter = getShooter(getInputData('id'));

			if($shooter == "-1") {
				header("location: dash.php?t=sa");
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
	}

	$smarty->assign("navbar", $navbar);

	return $template;
}
?>
