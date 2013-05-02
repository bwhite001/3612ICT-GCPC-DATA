<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL + E_NOTICE);

	include 'includes/defs.php';

	$current_code = getInputData('code');
	$return_url = (getInputData('return_url') == "") ? "dash.php" : getInputData('return_url');
	$current_data = $_REQUEST;

	switch ($current_code) {
		#Shooter ADD
		case 'sa':
			list($check, $sql, $error_data) = addShooter($current_data);
			if(!$check)
			{
				redirectToUrl("dash.php?t=sa", array('error_string' => $error_data, 'error_is_good' => 'false'));
				exit;
			}
			else
			{
				redirectToUrl($return_url, array('error_string' => "The Shooter Was Added Sucessfuly!", 'error_is_good' => 'true'));
			}
			echo $sql;
			break;
		
		default:
			echo "Code: $current_code <br>";
			var_dump($current_data);
			break;
	}
?>