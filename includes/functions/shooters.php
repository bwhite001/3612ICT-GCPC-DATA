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
function getShooter($id, $type)
{	
	$id = sanitiseMyStringNow($id);
	$shooter = array('' => , );
	if(doesExist("shooters", $id) && $type == "edit")
	{
		$shooter = getInfo("shooters", $id)
	}
}
?>