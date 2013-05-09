<?php
/*
 * Function definitions for list-detail example.
 */

require "includes/db_defs.php";
require "functions/shooters.php";
require "functions/series.php";
require "functions/accounts.php";
require "functions/pistol.php";
function nicetime($date)
    {
        if(empty($date)) {
            return "No date provided";
        }
        
        $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths         = array("60","60","24","7","4.35","12","10");
        
        $now             = time();
        $unix_date         = strtotime($date);
        
           // check validity of date
        if(empty($unix_date)) {    
            return "Bad date";
        }

        // is it future date or past date
        if($now > $unix_date) {    
            $difference     = $now - $unix_date;
            $tense         = "ago";
            
        } else {
            $difference     = $unix_date - $now;
            $tense         = "from now";
        }
        
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }
        
        $difference = round($difference);
        
        if($difference != 1) {
            $periods[$j].= "s";
        }
        
        return "$difference $periods[$j] {$tense}";
    }
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
        $friDate = strtotime("+3 day", $wedDate);

        $wedDateStr = date("jS M",$wedDate);
        $friDateStr = date("jS M",$friDate);
        
        $wedDateSql = date("Y-m-d", $wedDate);
        $friDateSql = date("Y-m-d", $friDate);

        $wed_sql = "SELECT * FROM `$table` where `date` = '$wedDateSql';";
        $fri_sql = "SELECT * FROM `$table` where `date` = '$friDateSql';";
        $wedCount = getSqlCount($wed_sql);
        $friCount = getSqlCount($fri_sql);

        $totalCount = $wedCount + $friCount;

        return array('wed' => $wedDateStr, 'wedc' => $wedCount, 'fri' => $friDateStr, 'fric' => $friCount, 'total' => $totalCount);
    }
 function sanitiseMyStringNow($string)
    {
        $server = mysql_open();

        $string = strip_tags($string);

        $string = mysql_real_escape_string($string);

        mysql_close($server);

        return $string;
    }
 function encriptPassword($username, $password)
 {
    $salt = $username;
    $storedPassword = crypt($password, $salt);

    return $storedPassword;
 }
function redirectToUrl($redirectUrl, $params)
{
    if($redirectUrl == "")
    {
        $redirectUrl = "index.php";
    }

    $smarty = new Smarty;

    $smarty->assign("redirectUrl", $redirectUrl);
    
    $smarty->assign("params", $params);

    $smarty->display("redirect.tpl");
}
?>
