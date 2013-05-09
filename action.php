<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL + E_NOTICE);

	session_start();

	require 'libs/smarty/libs/Smarty.class.php';
	include 'includes/defs.php';

	$currentUser = checkLogin(true);
	
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
				redirectToUrl($return_url, array('error_string' => "The Shooter: ".$error_data." Was Added Sucessfuly!", 'error_is_good' => 'true'));
			}
			echo $sql;
			break;
		#shooterEdit
		case 'se':

			$shooter = getShooter(getInputData('id'));

			if($shooter == "-1") {
				redirectToUrl("dash.php?t=s", array('error_string' => "Shooter Does Not exist!", 'error_is_good' => 'false'));
				exit;
			}

			list($check, $sql, $error_data) = editShooter($current_data, $shooter['id']);

			if(!$check)
			{	
				$redirect = "dash.php?t=se?id=".$shooter['id'];
				redirectToUrl($redirect, array('error_string' => $error_data, 'error_is_good' => 'false'));
				exit;
			}
			else
			{
				redirectToUrl($return_url, array('error_string' => "The Shooter: ".$error_data." Was Updated Sucessfuly!", 'error_is_good' => 'true'));
			}
			echo $sql;
			break;
		case 'ec':
			changeSeries(getInputData('series_id'));
			redirectToUrl(urldecode($return_url), "");
			break;
		case 'ea':
			echo addSeries(getInputData('snumber'), getInputData('date_started'), getInputData('length'), $return_url);
			break;
		case 'ee':
			echo updateSeries(getInputData('id'), getInputData('snumber'), getInputData('date_started'), getInputData('length'), $return_url);
			break;
		default:
			if($current_code != "")
			{
				echo "Code: $current_code <br>";
			}
			else
			{
				echo "No Code <br>";
			}

			if(count($current_data) > 0)
			{
				echo "Current Data: <br/>";
				foreach($current_data as $key => $value)
				{
					echo "<span style='display: block; margin-left: 50px'><b>$key</b> => <em>$value</em></span>";
				}
			}
			else
			{
				echo "No Current Data";
			}
			$url = (urldecode($return_url) == "") ? "dash.php" : urldecode($return_url);
			redirectToUrl($url, "");
			break;

	}
?>