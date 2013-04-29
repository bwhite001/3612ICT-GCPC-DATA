<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/navbar.php';

$smarty = new Smarty;

$smarty->display("login.tpl");

?>
