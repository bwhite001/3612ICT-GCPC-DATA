<?php
function getYearlySummary($year, $limit)
{
    $seriesNums = getSeriesArray($year);
    $yearSummaryAll = array();
    foreach ($seriesNums as $seriesId) {
      $current_series_id = $seriesId['id'];
      $yearSummary = array();
      $series = getSeries($current_series_id);

      $yearSummary["num"] = $series['snumber'];
      $yearSummary["maleAgg"] = getSeriesPointWinners($series, true, $limit);
      $yearSummary["femaleAgg"] = getSeriesPointWinners($series, false, $limit);
      array_push($yearSummaryAll, $yearSummary);
    }

    return $yearSummaryAll;
}

function getYearlyAgg($year, $male, $limit)
{
    $seriesNums = getSeriesArray($year);

    $index = 0;

    foreach($seriesNums as $seriesId)
    {   
        $sid = $seriesId['id'];
        $series = getSeries($sid);

        if($index = 0)
        {
          $yearAll = getSeriesPointWinners($series, $male, false);
        }
        else
        {
          $currentSeries = getSeriesPointWinners($series, $male, false);

          foreach ($currentSeries as $score) {
              list($isIN, $key) = searchForId('shooter_id', $score['shooter_id'], $yearAll);

              if($isIN)
              {
                  $yearAll[$key]['points'] += $score['points'];
                  $yearAll[$key]['count'] += $score['count'];
                  if($yearAll[$key]['score'] < $score['score'])
                  {
                      $yearAll[$key]['score'] = $score['score'];
                      $yearAll[$key]['date'] = $score['date'];
                  }
              }
              else
              {
                if($score['points'] > 0)
                  $yearAll[] = $score;
              }
          }
        }

        $index++;
    }


    uasort($yearAll, function ($i, $j) {
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
        $yearAll = array_slice($yearAll, 0, 4);
    }
    return $yearAll;
}

function getYearlyOverall($year, $male)
{
    $year = sanitiseMyStringNow($year);
    $yearSql = "SELECT id FROM `series` WHERE YEAR(date_started) = $year";


    $data = array();

    $main_sql = "SELECT * FROM scores WHERE series_id in ($yearSql) AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY score DESC;";

    $tmp = getArray("-1", $main_sql);

    foreach ($tmp as $shooter) {

        $query = "SELECT * FROM scores WHERE series_id in ($yearSql) AND shooter_id = ".$shooter['shooter_id'];

        $shooter['count'] = getSqlCount($query);

        $shooter['avg'] = getShooterStats($shooter['shooter_id'],"AVG","year", $year);
        $shooter['score'] = getShooterStats($shooter['shooter_id'],"MAX","year", $year);
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
function getYearlyTopShot($year, $male)
{
    $year = sanitiseMyStringNow($year);
    $yearSql = "SELECT id FROM `series` WHERE YEAR(date_started) = $year";


    $data = array();

    $main_sql = "SELECT * FROM scores WHERE series_id in ($yearSql) AND shooter_id in (SELECT id FROM `shooters` WHERE male = '$male') GROUP BY shooter_id ORDER BY score DESC;";

    $tmp = getArray("-1", $main_sql);

    foreach ($tmp as $shooter) {

        $query = "SELECT * FROM scores WHERE series_id in ($yearSql) AND shooter_id = ".$shooter['shooter_id'];

        $shooter['count'] = getSqlCount($query);

        $shooter['avg'] = getShooterStats($shooter['shooter_id'],"AVG","year", $year);
        $shooter['score'] = getShooterStats($shooter['shooter_id'],"MAX","year", $year);

        if($shooter['count'] >= 8)
          $data[] = $shooter;

    }

    uasort($data, function ($i, $j) {
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
    $data = array_slice($data, 0, 4);
    return $data;
}
function getYearlyAvgMaxs($year)
{
    $year = sanitiseMyStringNow($year);
    $yearSql = "SELECT id FROM `series` WHERE YEAR(date_started) = $year";

    $seriesNums = getSeriesArray($year);

    $data = array();

    $main_sql = "SELECT * FROM scores WHERE series_id in ($yearSql) GROUP BY shooter_id ORDER BY score DESC;";

    $tmp = getArray("-1", $main_sql);
    foreach ($tmp as $shooter) {

      foreach ($seriesNums as $seriesId) {
        $current_series_id = $seriesId['id'];
        $series = getSeries($current_series_id);

        $shooter['max_series'.$series['snumber']] = getShooterStats($shooter['shooter_id'],"MAX","series", $current_series_id);
        $shooter['avg_series'.$series['snumber']] = getShooterStats($shooter['shooter_id'],"AVG","series", $current_series_id);
      }

       $data[] = $shooter;
    }
  return $data;
}
?>