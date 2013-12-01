<?php
	function getCurrentSeries($id)
	{
		$series = getSeries($id);

		if($series == "-1")
		{
			$series = getInfo("-1", "SELECT * FROM series WHERE `date_started` = (SELECT MAX(`date_started`) FROM series)");

			if(!doesExist("series", $series['id']))
			{
				$series = "-1";
			}

		}
		if(isset($series['id']))
		{
			changeSeries($series['id']);
		}
		else
		{
			changeSeries("-1");
		}

		return $series;
	}
	function getSeries($id)
	{
		$id = sanitiseMyStringNow($id);
		if($id != "" && doesExist("series", $id))
		{
			$series = getInfo("series", $id);
		}
		else
		{
				$series = "-1";
		}
		return $series;
	}

	function getSeriesArray($year)
	{
		$year = sanitiseMyStringNow($year);
		$yearSql = "SELECT id FROM `series` WHERE YEAR(date_started) = $year";
		return getArray("-1", $yearSql);
	}
	function changeSeries($id)
	{
		$id = sanitiseMyStringNow($id);
		if(doesExist("series", $id))
		{
			$_SESSION['current_series_id'] = $id;
		}
		else
		{
			unset($_SESSION['current_series_id']);
		}
	}

	function getSerieses($currentYear, $currentPage)
	{
		$currentYear = sanitiseMyStringNow($currentYear);
		$currentPage = sanitiseMyStringNow($currentPage);

		$yearSql = "SELECT YEAR(date_started) as year from series group by year desc having count(year) > 0";

		$currentCheck = doesExist("-1", "SELECT YEAR(date_started) as year from series where YEAR( date_started ) = '".$currentYear."' group by year desc having count(year) > 0");

		$currentYearArr = ($currentCheck) ? $currentYear : getInfo("-1", $yearSql);
		$currentYear = $currentYearArr['year'];
		$query = "SELECT * FROM `series` WHERE YEAR(date_started) = '$currentYear' ";

		$total_series = getSqlCount($query);

		$series_per_page = 5;

		$total_pages = ceil($total_series/$series_per_page);

		if($current_page < 1)
		{
			$current_page = 1;
		}
		else if($total_pages > 0 && $current_page > $total_pages)
		{
			$current_page = $total_pages;
		}

		$offset = ($current_page-1) * $series_per_page;

		$query .= " ORDER BY date_started DESC LIMIT $offset, $series_per_page;";
		$allYears = getArray("-1", $yearSql);
		$allSeries = getArray("-1", $query);

		return array($allYears, $allSeries, $currentYear, $currentPage, $total_pages);
	}

	function getSeriesDates($date, $length)
	{
		$s = date("jS F",strtotime($date));
		$f = date("jS F",strtotime("+$length week", strtotime($date)));
		return array('s' => $s, 'f' => $f);
	}

	function addSeries($snumber, $date_started, $length, $return_url)
	{
		$snumber = sanitiseMyStringNow($snumber);
		$date_started = sanitiseMyStringNow($date_started);
		$length = sanitiseMyStringNow($length);

		$series = array('snumber' => $snumber, 'date_started' => $date_started, 'length' => $length, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"));

		list($snumberBool, $date_startedBool, $lengthBool, $exsists) = validateSeries($snumber, $date_started, $length, false, $updateid);

		$containsError = ($snumberBool || $date_startedBool || $lengthBool || $exsists);

		if($containsError)
		{
			$errorString = "<b>Error In Form</b> <br/> ";

			if($snumberBool)
				$errorString .= "The Series Number Must be a Number! <br/>";
			if($lengthBool)
				$errorString .= "The Length Must be a Number! <br/>";

			if($date_startedBool)
				$errorString .= "Date Started must be a Valid Date and Start On Wednesday! <br/>";

			if($exsists)
				$errorString .= "The Series already exsists for that year! <br/>";

			$redirect = "dash.php?t=ea";
		}
		else
		{
			$dates = getSeriesDates($date_started, $length);
			$errorString = "<b>The Series $snumber was successfully added!</b> <br /> With start date of ".$dates['s']." and a finish date of ".$dates['f'];
			$redirect = $return_url;

			echo createQuery("series", $series);

		}
		$error_is_good = ($containsError) ? "false" : "true";
		redirectToUrl($redirect, array('error_string' => $errorString, 'error_is_good' => $error_is_good));
	}
	function updateSeries($id, $snumber, $date_started, $length, $return_url)
	{
		$id = sanitiseMyStringNow($id);

		if(!doesExist("series", $id))
		{
			echo redirectToUrl("dash.php?t=e", array('error_string' => "Series Does Not exist!", 'error_is_good' => 'false'));
			exit;
		}

		$snumber = sanitiseMyStringNow($snumber);
		$date_started = sanitiseMyStringNow($date_started);
		$length = sanitiseMyStringNow($length);

		$series = array('snumber' => $snumber, 'date_started' => $date_started, 'length' => $length, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"));

		list($snumberBool, $date_startedBool, $lengthBool, $exsists) = validateSeries($snumber, $date_started, $length, true, $updateid);

		$containsError = ($snumberBool || $date_startedBool || $lengthBool || $exsists);

		if($containsError)
		{
			$errorString = "<b>Error In Form</b> <br/> ";

			if($snumberBool)
				$errorString .= "The Series Number Must be a Number! <br/>";
			if($lengthBool)
				$errorString .= "The Length Must be a Number! <br/>";

			if($date_startedBool)
				$errorString .= "Date Started must be a Valid Date and Start On Wednesday! <br/>";

			if($exsists)
				$errorString .= "The Series already exsists for that year! <br/>";

			$redirect = "dash.php?t=ee&id=".$id;
		}
		else
		{
			$dates = getSeriesDates($date_started, $length);
			$errorString = "<b>The Series $snumber was successfully updated!</b> <br /> With start date of ".$dates['s']." and a finish date of ".$dates['f'];
			$redirect = $return_url;
			echo updateQuery("series", $id, $series);

		}
		$error_is_good = ($containsError) ? "false" : "true";
		redirectToUrl($redirect, array('error_string' => $errorString, 'error_is_good' => $error_is_good));
	}
	function validateSeries($snumber, $date_started, $length, $update, $updateid)
	{
		$snumberBool = false;
		$date_startedBool = false;
		$lengthBool = false;
		$exsists = false;

		if($date_started == "" || !(date('N', strtotime($date_started)) == "3"))
			$date_startedBool = true;

		if(!is_numeric($snumber) || $snumber == "")
			$snumberBool = true;

		if(!is_numeric($length) || $length == "")
			$lengthBool = true;

		if(!$snumberBool && !$date_startedBool)
		{
			$year = date('Y', strtotime($date_started));
			$upCheck = ($update) ? "and id != $id;" : ";";
			$sql = "SELECT * FROM `series` WHERE snumber = '$snumber' and YEAR(date_started) = '$year' $upCheck";
			echo $sql;
			$exsists = doesExist("-1", $sql);
		}

		return array($snumberBool, $date_startedBool, $lengthBool, $exsists);
	}
?>
