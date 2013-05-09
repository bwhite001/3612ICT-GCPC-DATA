<?php

ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

require 'libs/smarty/libs/Smarty.class.php';
include 'includes/defs.php';

$currentUser = checkLogin(false);

$users = getArray("admins","");
if($currentUser != "-1")
{
	header("location: dash.php");
}

$isError = getInputData('isError');
$error = getInputData('error');

$smarty = new Smarty;

$smarty->assign("isError", $isError);
$smarty->assign("error", $error);

$smarty->display("login.tpl");

?>
