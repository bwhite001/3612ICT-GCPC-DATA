<?php
function getSeriesPointWinners($series, $male, $limit)
{
    list($totalArray) = getWeekPointsWinners($series, 1, $male, true);

    for($i = 2; $i < $series['length']+1; $i++)
    {   

        list($weeklyWinners) = getWeekPointsWinners($series, $i, $male, true);
        foreach ($weeklyWinners as $winner) {

            list($isIN, $key) = searchForId('shooter_id', $winner['shooter_id'], $totalArray);


            if($winner['points'] < 0)
                $winner['points'] = 0;

            if($isIN)
            {
                $totalArray[$key]['points'] += $winner['points'];
                if($totalArray[$key]['score'] < $winner['score'])
                {
                    $totalArray[$key]['score'] = $winner['score'];
                }
            }
            else
            {
                if($winner['points'] > 0)
                    $totalArray[] = $winner;
            }

        }
    }
    

    uasort($totalArray, function ($i, $j) {
        $a = $i['points'];
        $b = $j['points'];
        $ac = $i['count'];
        $bc = $j['count'];
        if ($a < $b) return 1;
        elseif ($a > $b) return -1;
        elseif ($a == $b)
        {
            if($ac > $bc)
            {
               return -1; 
            }
            elseif($bc > $ac)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
    });


    if($limit == true)
    {
        $totalArray = array_slice($totalArray, 0, 4);
    }
    return $totalArray;
}
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
    $year = date("Y", $tempDate);

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
        $sql = "SELECT count(shooter_id) as c from scores where series_id = ".$series['id']." and shooter_id = ".$scores[$i]['shooter_id']." and handicap > 0";
        $countz = getArray("-1", $sql);
        $scores[$i]['count'] = $countz[0][0];
        $scores[$i]['avg'] = getShooterStats($scores[$i]['shooter_id'],"AVG","series", $scores[$i]['series_id']);
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
    if($limit == true)
    {
        $scores = array_slice($scores, 0, $arrayCount-1);
    }
    return array($scores, $date1, $date2);
}
function getWeeklyStats($series, $week_number, $male)
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

    $main_sql1 = "SELECT *,
    (score+handicap) as total,
    IF(score+handicap <= $max, score+handicap, score+handicap - (score+handicap-$max)*2) as stotal 
    FROM `scores` WHERE `date` = '$date1' AND series_id = ".$series['id'].
    " AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY stotal DESC;";

    $main_sql2 = "SELECT *,
    (score+handicap) as total,
    IF(score+handicap <= $max, score+handicap, score+handicap - (score+handicap-$max)*2) as stotal 
    FROM `scores` WHERE `date` = '$date2' AND series_id = ".$series['id'].
    " AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY stotal DESC;";

    $score1 = getArray("-1", $main_sql1);
    $score2 = getArray("-1", $main_sql2);

    for($i = 0; $i<count($score1); $i++) {
        $score1[$i]['avg'] = getShooterStats($score1[$i]['shooter_id'],"AVG","series", $score1[$i]['series_id']);
    }
    for($i = 0; $i<count($score2); $i++) {
        $score2[$i]['avg'] = getShooterStats($score2[$i]['shooter_id'],"AVG","series", $score2[$i]['series_id']);
    }
    return array($score1, $score2, $week_number, $date1, $date2);
}
function getTopShotSeries($series, $male, $limit)
{   
    $series_id = $series['id'];
    $topShot = array();

    $main_sql = "SELECT * FROM scores WHERE handicap >= 0 and series_id = $series_id AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY score DESC;";

    $tmp = getArray("-1", $main_sql);

    foreach ($tmp as $shooter) {

        $query = "SELECT * FROM scores WHERE series_id = $series_id AND shooter_id = ".$shooter['shooter_id'];

        $shooter['count'] = getSqlCount($query);

        $shooter['avg'] = getShooterStats($shooter['shooter_id'],"AVG","series", $series_id);

        $shooter['score'] = getShooterStats($shooter['shooter_id'],"MAX","series", $series_id);

        if($shooter['count'] >= 3)
        {
           $topShot[] = $shooter;
        }

    }
    uasort($topShot, function ($i, $j) {
        $a = $i['score'];
        $b = $j['score'];
        $ac = $i['count'];
        $bc = $j['count'];
        if ($a < $b) return 1;
        elseif ($a > $b) return -1;
        elseif ($a == $b)
        {
            if($ac > $bc)
            {
               return -1; 
            }
            elseif($bc > $ac)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
    });
    if($limit == true)
    {
        $topShot = array_slice($topShot, 0, 4);
    }
    return $topShot;
}

function getSeriesOverall($series, $male)
{
    $series_id = $series['id'];

    $data = array();

    $main_sql = "SELECT * FROM scores WHERE series_id = $series_id AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY score DESC;";

    $tmp = getArray("-1", $main_sql);

    foreach ($tmp as $shooter) {

        $query = "SELECT * FROM scores WHERE series_id = $series_id AND shooter_id = ".$shooter['shooter_id'];

        $shooter['count'] = getSqlCount($query);

        $shooter['avg'] = getShooterStats($shooter['shooter_id'],"AVG","series", $series_id);

        $shooter['score'] = getShooterStats($shooter['shooter_id'],"MAX","series", $series_id);

        $data[] = $shooter;

    }

    uasort($data, function ($i, $j) {
        $x = getShooter($i['shooter_id']);
        $y = getShooter($j['shooter_id']);
        $a = $x['lastname'];
        $b = $y['lastname'];
        if ($a == $b) return 0;
        elseif ($a < $b) return -1;
        else return 1;
    });

    return $data;
}

function getWeeklyTopShot($series, $week_number, $male)
{
    $week_number = ($week_number-1);

    if($week_number < 0)
        $week_number = 0;
    else if ($week_number > $series['length']) {
        $week_number = $series['length'];
    }
    $tempDate = strtotime("+$week_number week", strtotime($series['date_started']));
    $date1 = date("Y-m-d",strtotime("+0 day", $tempDate));
    $date2 = date("Y-m-d",strtotime("+2 day", $tempDate));

    $main_sql = "SELECT * FROM `scores` WHERE (`date` = '$date1' OR `date` = '$date2') AND handicap != -1 AND series_id = ".$series['id'].
    " AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY score DESC LIMIT 0, 1;";

    $topShot = getInfo("-1", $main_sql);
    $shooter = getShooter($topShot['shooter_id']);
    $topShot['name'] = $shooter['firstname']." ".$shooter['lastname'];
    return $topShot;
}
?>