<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';
include 'includes/defs.php';

$smarty = new Smarty;

$selectedTab = (in_array(getInputData('t'), array("s", "e", "p","r","a")))? getInputData('t') : "s";

$navbar[$selectedTab]['selected'] = 1;

$smarty->assign("navbar", $navbar);

$smarty->assign("template", $navbar[$selectedTab]['link']);


$smarty->display("core.tpl");

?>
