<?php
	function searchShootersJSON($query)
	{
		$query = sanitiseMyStringNow($query);

		if($query != "")
		{
			$outArr = array();
			$terms = preg_split('/[\s]+/', $query);
			$tempTerm = $terms[0];
			$sql = "SELECT id, CONCAT(`shooters`.firstname, ' ', `shooters`.lastname) as name, male from `shooters` WHERE (`shooters`.firstname like '%$tempTerm%' OR `shooters`.lastname like '%$tempTerm%') ";
			if(count($terms) > 1)
				for($i = 1; $i < count($terms); $i++ )
				{
					$tempTerm = $terms[$i];
					$sql .= "AND (`shooters`.firstname like '%$tempTerm%' OR `shooters`.lastname like '%$tempTerm%') ";
				}
			$count = getSqlCount($sql);
			$sql .= " ORDER BY `shooters`.lastname LIMIT 0,5;";
			$shooters = getArray("-1", $sql);

			$outArr['length'] = $count;
			$outArr['location'] = sanitiseMyStringNow(getInputData('location'));
			$outArr['backUrl'] = sanitiseMyStringNow(getInputData('backurl'));
			$outArr['date'] = sanitiseMyStringNow(getInputData('date'));
			$outArr['seriesid'] = sanitiseMyStringNow(getInputData('seriesid'));
			$outArr['shooters'] = $shooters;
			header('Content-type: text/json');
			return json_encode($outArr);
		}
	}
?>