<?php
	function getWeekly($series, $week_number, $rifle)
    {   
        $table = ($rifle) ? "rifle_scores" : "scores";
        $week_number = ($week_number-1);

        if($week_number < 0)
            $week_number = 0;
        else if ($week_number > $series['length']) {
            $week_number = $series['length'];
        }
        $wedDate = strtotime("+$week_number week", strtotime($series['date_started']));
        $friDate = strtotime("+2 day", $wedDate);

        $wedDateStr = date("jS M",$wedDate);
        $friDateStr = date("jS M",$friDate);
        
        $wedDateSql = date("Y-m-d", $wedDate);
        $friDateSql = date("Y-m-d", $friDate);

        $wed_sql = "SELECT * FROM `$table` where `date` = '$wedDateSql' and series_id = ".$series['id'].";";
        $fri_sql = "SELECT * FROM `$table` where `date` = '$friDateSql' and series_id = ".$series['id'].";";
        $wedCount = getSqlCount($wed_sql);
        $friCount = getSqlCount($fri_sql);

        $totalCount = $wedCount + $friCount;

        return array('wed' => $wedDateStr, 'wedc' => $wedCount, 'fri' => $friDateStr, 'fric' => $friCount, 'total' => $totalCount);
    }

    function createScore($hcap, $series_id, $date, $table, $return_url, $topScore)
    {

    }

    function validateScore($hcap, $series_id, $date, $table, $topScore)
    {
        $isError = false;

        $errorString = "<b>Errors in Form!</b> <br />";

        if($table != "scores" || $table != "rifle_scores")
        {
            $errorString .= "Invalid Table </br>";
        }
        if($table == 'scores')
        {
            if($hcap == "")
            {
                $errorString .= "Handicap Must have a value! (Can Be Zero)</br>";
                
            } 
        }
    }
?>