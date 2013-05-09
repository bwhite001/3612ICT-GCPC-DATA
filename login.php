<?php
	session_start();

	ini_set('display_errors', true);
	error_reporting(E_ALL + E_NOTICE);

	require "includes/defs.php";

	$isError = false;
	$error = "";

	$logout = (getInputData('t') == "1") ? true : false;

	if($logout)
	{
		unset($_SESSION['user_id']);
		$isError = false;
		$error = "Logged Out Successfuly!";
		redirectToUrl("index.php", array("error" => $error, "isError" => $isError));
	}
	else
	{
		$username = sanitiseMyStringNow(getInputData('username'));
		$password = sanitiseMyStringNow(getInputData('password'));

		if($username == "" || $password == "")
		{
			$isError = true;
			$error = "Username or Password <br/> Cannot Be Blank!";
			redirectToUrl("index.php", array("error" => $error, "isError" => $isError));
			exit;
		}

		list($check, $q) = authenticate($username, $password);

		if($check != "-1")
		{
			$_SESSION['user_id'] = $check['id'];
			redirectToUrl("dash.php", "");
			exit;
		}

		else
		{
			unset($_SESSION['user_id']);
			$isError = true;
			$error = "Invalid Username or Password";
			redirectToUrl("index.php", array("error" => $error, "isError" => $isError));
			exit;
		}

		redirectToUrl("index.php", "");
	}
function authenticate($username, $password) {
	if ($username == "" || $password == "")
		return false;
	$password_digest = encriptPassword($username, $password);
	$query = "SELECT * FROM admins WHERE username = '$username' AND password_digest = '$password_digest';";

	if(getSqlCount($query) == 1)
	{
		return array(getInfo("-1", $query), $query);
	}
	else
	{
		return array('-1', $query);
	}
}
?>