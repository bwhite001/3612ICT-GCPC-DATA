<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';

$smarty = new Smarty;

$navbarMain["home"]["selected"] = 1;

$smarty->assign("navbarMain", $navbarMain);
$smarty->assign("navbarSide", $navbarSide);
$smarty->assign("hud", $hud);
$smarty->assign("template", 'homepage');


$smarty->display("core.tpl");

?>
