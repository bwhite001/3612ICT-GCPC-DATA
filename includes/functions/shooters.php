<?php

function getShooters($search, $current_letter, $current_page)
{
	$search = sanitiseMyStringNow($search);
	$current_letter = sanitiseMyStringNow($current_letter);
	$current_page = sanitiseMyStringNow($current_page);

	$query = "SELECT * FROM `shooters` WHERE ";
	
	if($search != "")
	{
		$query = getMultiTermSearch($query, $search);
	}
	else
	{
		$query .= "upper(lastname) LIKE '$current_letter%'";
	}

	$shooter_number_array = getShooterLetterArray();

	$total_shooters = getSqlCount($query);

	$shooters_per_page = 5;

	$total_pages = ceil($total_shooters/$shooters_per_page);

	if($current_page < 1)
	{
		$current_page = 1;
	}
	else if($total_pages > 0 && $current_page > $total_pages)
	{
		$current_page = $total_pages;
	}

	$offset = ($current_page-1) * $shooters_per_page;
	

	$query .= " ORDER BY lastname LIMIT $offset, $shooters_per_page;";

	$shooters = getArray("-1", $query);

	return array($shooters, $shooter_number_array, $current_page, $total_pages);


}

function getMultiTermSearch($query, $search)
{
	if($search != "")
	{
		$searchStr = "";
		$terms = preg_split('/[\s]+/', $search);

		$searchStr .= "(firstname like '%$terms[0]%' or lastname like '%$terms[0]%') ";

		if(count($terms) > 1)
		{
			for ($i=1; $i < count($terms); $i++) { 
				$searchStr .= "AND (firstname like '%$terms[$i]%' or lastname like '%$terms[$i]%') ";
			}
		}
		$query .= $searchStr;
	}

	return $query;
}

function getShooterLetterArray()
{
	$out = array();

	for ($i=65; $i <= 90; $i++) { 
		$letter = chr($i);
		$query = "SELECT * FROM `shooters` WHERE upper(lastname) LIKE '$letter%';";

		$out[$letter] = getSqlCount($query);
	}

	return $out;
}
function getShooter($id)
{	
	$id = sanitiseMyStringNow($id);
	if(doesExist("shooters", $id))
	{
		$shooter = getInfo("shooters", $id);
		return $shooter;
	}
	else
	{
		return "-1";
	}
}

function addShooter($data)
{
	$valid_data = array("firstname","lastname","male","senior","grade","cnumber","rfid");
	$shooter = array();
	$hasError = false;
	$errorSting = "There are Errors in the Form! ";
	foreach($data as $name => $value) {
		if(in_array($name, $valid_data))
		{
			if(sanitiseMyStringNow($value) == "" && !($name == "cnumber" || $name == "rfid"))
			{
				$errorSting .= ucwords($name)." cannot be Blank ";
				$shooter[$name] = sanitiseMyStringNow($value);
				$hasError = true;
			}
			else
			{
				if($name == "firstname" || $name == "lastname")
					$value = ucwords($value);

				$shooter[$name] = sanitiseMyStringNow($value);
			}
		}
	}

	$firstname = $shooter['firstname'];
	$lastname = $shooter['lastname'];

	if(doesExist("-1","SELECT * FROM `shooters` WHERE firstname = '$firstname' AND lastname = '$lastname';"))
	{
		$hasError = true;
		$errorSting = "The Shooter, $firstname $lastname already exists!";
	}

	if($hasError)
	{	
		$_SESSION['shooter_has_error'] = true;

		foreach($shooter as $name => $value) {
			$_SESSION[$name] = $value;
		}

		return array(false, "", $errorSting);

	}
	else
	{
		unset($_SESSION['shooter_has_error']);
		foreach($shooter as $name => $value) {
			unset($_SESSION[$name]);
		}
		$shooter['updated_at'] = date("Y-m-d H:i:s", time());
		$shooter['created_at'] = date("Y-m-d H:i:s", time());
		$sql = createQuery("shooters", $shooter);

		return array(true, $sql, "$firstname $lastname");
	}
}
function editShooter($data, $id)
{
	if(!doesExist("shooters",$id))
	{
		redirectToUrl("dash.php?t=s", array('error_string' => "Shooter Does Not exist!", 'error_is_good' => 'false'));
		exit;
	}

	$valid_data = array("id","firstname","lastname","male","senior","grade","cnumber","rfid");
	$shooter = array();
	$hasError = false;
	$errorSting = "There are Errors in the Form! ";
	foreach($data as $name => $value) {
		if(in_array($name, $valid_data))
		{
			if(sanitiseMyStringNow($value) == "" && !($name == "cnumber" || $name == "rfid" || $name == "id"))
			{
				$errorSting .= ucwords($name)." cannot be Blank ";
				$shooter[$name] = sanitiseMyStringNow($value);
				$hasError = true;
			}
			else
			{
				if($name == "firstname" || $name == "lastname")
					$value = ucwords($value);

				$shooter[$name] = sanitiseMyStringNow($value);
			}
		}
	}

	$firstname = $shooter['firstname'];
	$lastname = $shooter['lastname'];
	if(doesExist("-1","SELECT * FROM `shooters` WHERE firstname = '$firstname' AND lastname = '$lastname' AND id <> $id;"))
	{
		$hasError = true;
		$errorSting = "The Shooter, $firstname $lastname already exists!";
	}

	if($hasError)
	{	

		foreach($shooter as $name => $value) {
			$_SESSION[$name] = $value;
		}

		return array(false, "", $errorSting);

	}
	else
	{
		foreach($shooter as $name => $value) {
			unset($_SESSION[$name]);
		}
		$errorSting = $firstname." ".$lastname;
		$shooter['updated_at'] = date("Y-m-d H:i:s", time());
		$sql = updateQuery("shooters", $id, $shooter);

		return array(true, $sql, $errorSting);
	}
}
?>