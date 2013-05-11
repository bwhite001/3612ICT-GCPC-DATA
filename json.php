<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL + E_NOTICE);

	session_start();

	include 'includes/defs.php';

	$currentUser = checkLogin(true);
	$current_code = getInputData('code');
	$current_type = getInputData('type');

	switch ($current_code) {
		case 's':
			if($current_type == "search")
			{
				echo searchShootersJSON(getInputData('query'));
			}
			break;
	}
?>