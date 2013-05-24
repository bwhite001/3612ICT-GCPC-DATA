<?php

function getWeekPointsWinners($series, $week_number, $male, $limit)
{
    $day = ($fri == 2) ? 2 : 0;

    $week_number = ($week_number-1);

    if($week_number < 0)
        $week_number = 0;
    else if ($week_number > $series['length']) {
        $week_number = $series['length'];
    }

    $tempDate = strtotime("+$week_number week", strtotime($series['date_started']));
    $date1 = date("Y-m-d",strtotime("+0 day", $tempDate));
    $date2 = date("Y-m-d",strtotime("+2 day", $tempDate));

    if($male == true)
    	$max = 600;
    else
    	$max = 400;

    $main_sql = "SELECT *,
    (score+handicap) as total, 0 as points,
    IF(score+handicap <= $max, score+handicap, score+handicap - (score+handicap-$max)*2) as stotal 
    FROM `scores` WHERE (`date` = '$date1' OR `date` = '$date2') AND handicap != -1 AND series_id = ".$series['id'].
    " AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY stotal DESC;";
	$scores = getArray("-1", $main_sql);

    $prevPoints = 0;
    $prevTotal = 0;
    $arrayCount = 0;
    for($i = 0; $i<count($scores); $i++)
    {
        if($scores[$i]["handicap"] >= 0)
        {
            if($i == 0)
            {
                $scores[$i]["points"] = 3;
                $prevPoints = 3;
                $prevTotal = $scores[$i]["stotal"];
                $arrayCount ++;
            }
            else if($i > 0)
            {
                if ($scores[$i]["stotal"] == $prevTotal)
                {
                    $scores[$i]["points"] = $prevPoints;
                    $arrayCount++;
                }
                else if ($scores[$i]["stotal"] < $prevTotal && $prevPoints != -1)
                {
                    $prevPoints = ($prevPoints - 1);
                    $scores[$i]["points"] = $prevPoints;
                    $prevTotal = $scores[$i]["stotal"];
                    $arrayCount++;
                }
                else if ($prevPoints <= -1)
                {
                    $scores[$i]["points"] = -1;
                }
            }
        }
        else
        {
            $scores[$i]["points"] = -1;
        }
    }
    uasort($scores, function ($i, $j) {
            $a = $i['points'];
            $b = $j['points'];
            if ($a == $b) return 0;
            elseif ($a < $b) return 1;
            else return -1;
        });
    $scores = array_slice($scores, 0, $arrayCount-1);
    return array($scores, $date1, $date2);
}

?>