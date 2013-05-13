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
    function updateScore($id, $hcap, $score, $series_id, $shooter_id, $date, $table, $return_url, $this_url, $topScore)
    {
        $id = sanitiseMyStringNow($id);
        $hcap = sanitiseMyStringNow($hcap);
        $score = sanitiseMyStringNow($score);
        $series_id = sanitiseMyStringNow($series_id);
        $shooter_id = sanitiseMyStringNow($shooter_id);
        $date = sanitiseMyStringNow($date);
        $table = sanitiseMyStringNow($table);
        $this_url = sanitiseMyStringNow($this_url);
        $return_url = sanitiseMyStringNow($return_url);
        $topScore = sanitiseMyStringNow($topScore);

        if(!doesExist($table, $id))
            redirectToUrl($return_url, array('error_string' => "Invalid ID!", 'error_is_good' => 'false'));  

        list($isError, $errorString) = validateScore($hcap, $score, $series_id, $shooter_id, $date, $table, $topScore, true, $id);

        if($isError)
        {
            $this_url = urldecode($this_url);
            redirectToUrl($this_url, array('error_string' => $errorString, 'error_is_good' => 'false', 'backurl' => $return_url));  
        }
        else
        {
            $updateAt = date("Y-m-d H:i:s");

            if($table == 'scores')
            {
                
                $score = array('date' => $date,'score' => $score, 'handicap' => $hcap, 'shooter_id' => $shooter_id, 'series_id' => $series_id, 'updated_at' => $updateAt);
            }
            else
            {
                $score = array('date' => $date,'score' => $score, 'match' => $hcap, 'shooter_id' => $shooter_id, 'series_id' => $series_id, 'updated_at' => $updateAt);
            }
            redirectToUrl($return_url, array('error_string' => "Score Updated Successfuly!", 'error_is_good' => 'true'));
            return updateQuery($table,$id, $score);
        }
    }
    function createScore($hcap, $score, $series_id, $shooter_id, $date, $table, $return_url, $this_url, $topScore)
    {
        $hcap = sanitiseMyStringNow($hcap);
        $score = sanitiseMyStringNow($score);
        $series_id = sanitiseMyStringNow($series_id);
        $shooter_id = sanitiseMyStringNow($shooter_id);
        $date = sanitiseMyStringNow($date);
        $table = sanitiseMyStringNow($table);
        $this_url = sanitiseMyStringNow($this_url);
        $return_url = sanitiseMyStringNow($return_url);
        $topScore = sanitiseMyStringNow($topScore);

        list($isError, $errorString) = validateScore($hcap, $score, $series_id, $shooter_id, $date, $table, $topScore, false, "");

        if($isError)
        {
            $this_url = urldecode($this_url);
            redirectToUrl($this_url, array('error_string' => $errorString, 'error_is_good' => 'false', 'backurl' => $return_url));  
        }
        else
        {
            $createdAt = date("Y-m-d H:i:s");

            if($table == 'scores')
            {
                
                $score = array('date' => $date,'score' => $score, 'handicap' => $hcap, 'shooter_id' => $shooter_id, 'series_id' => $series_id, 'created_at' => $createdAt, 'updated_at' => $createdAt);
            }
            else
            {
                $score = array('date' => $date,'score' => $score, 'match' => $hcap, 'shooter_id' => $shooter_id, 'series_id' => $series_id, 'created_at' => $createdAt, 'updated_at' => $createdAt);
            }
            redirectToUrl($return_url, array('error_string' => "Score Created Successfuly!", 'error_is_good' => 'true'));
            return createQuery($table, $score);
        }
    }
    function deleteScore($id, $backurl, $table)
    {
        $id = sanitiseMyStringNow($id);
        $backurl = urldecode(sanitiseMyStringNow($backurl));
        $table = sanitiseMyStringNow($table);

        if($table != "scores" && $table != "rifle_scores")
        {
            redirectToUrl($backurl, array('error_string' => "Invalid Table!", 'error_is_good' => 'false'));
            exit;
        }
        if(!doesExist($table, $id))
        {
            redirectToUrl($backurl, array('error_string' => "Invalid Score Id!", 'error_is_good' => 'false'));
            exit;
        }
        else
        {
            echo deleteStuff($table, $id);
            redirectToUrl($backurl, array('error_string' => "Score Deleted Successfuly!", 'error_is_good' => 'true'));
        }
    }
    function validateScore($hcap, $score, $series_id, $shooter_id, $date, $table, $topScore, $update, $id)
    {
        $isError = false;

        $errorString = "<b>Errors in Form!</b> <br />";

        if($table != "scores" && $table != "rifle_scores")
        {
            $errorString .= "Invalid Table<br />";
            $isError = true;
        }
        if($table == 'scores')
        {
            if($hcap == "" || $hcap < "-1")
            {
                $errorString .= "$hcap Handicap Must have a value (Can Be Zero)<br />";
                $isError = true;
            } 
        }
        else {
            if($hcap == "" || $hcap < "0" || $hcap > "2")
            {
                $errorString .= "Invalid Match Type $hcap<br />";
                $isError = true;
            }
        }

        if(!doesExist("series", $series_id))
        {
            $errorString .= "Invalid Series <br />";
            $isError = true;
        }

        if(!doesExist("shooters", $shooter_id))
        {
            $errorString .= "Invalid Shooter <br />";
            $isError = true;
        }
        if($score == "" || $score < 0)
        {
            $errorString .= "Invalid Score <br />";
            $isError = true;
        }
        if($score > $topScore)
        {
            $errorString .= "Score To Big (Greater Than $topScore) <br />";
            $isError = true;
        }

        if(date('N', strtotime($date)) != 3 && date('N', strtotime($date)) != 5)
        {
            $errorString .= "Score must be on a Wednesday or Friday <br />";
            $isError = true;
        }

        $sql = "SELECT * FROM `$table` where `date` = '$date' and series_id = '$series_id' and shooter_id = '$shooter_id'";

        if($update)
        {   
            if(doesExist("scores", $id))
            {
                $sql .= " and id != $id;";
            }
            else
            {
                $errorString .= "Invalid Score id <br />";
                $isError = true;
            }
        }

        if(doesExist("-1", $sql))
        {
            $errorString .= "Shooter Has already shot Today <br />";
            $isError = true;
        }

        return array($isError, $errorString);
    }
?>