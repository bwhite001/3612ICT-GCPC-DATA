<?php
	session_start();
	require "includes/defs.php";
	$isError = false;
	$error = "";

	$logout = (getInputData('t') == "1");
	if($logout)
	{
		unset($_SESSION['user_id']);
		$isError = false;
		$error = "Logged Out Successfuly!";
	}
	else
	{
		$username = sanitiseMyStringNow(getInputData('username'));
		$password = sanitiseMyStringNow(getInputData('password'));
		if($username == "" || $password == "")
		{
			$isError = true;
			$error = "Username and Password Cannot Be Blank!";
		}
		$check = authenticate($username, $password);
		if($check != "-1")
		{
			$_SESSION['user_id'] = $check['id'];
		}
		else
		{
			unset($_SESSION['user_id']);
		}
	}
	redirectToUrl("index.php", array("error" => $error, "isError" => $isError))
	exit;
function authenticate($username, $password) {
	if ($username == "" || $password == "")
		return false;
	$salt = substr($username, 0, 2);
	$passworrd_digest = crypt($password, $salt);
	$query = "SELECT * FROM lab_users WHERE username = '$username' AND passworrd_digest = '$passworrd_digest'";

	if(getSqlCount($query) == 1)
	{
		return getInfo("-1", $query);
	}
	else
	{
		return "-1";
	}
}
?>