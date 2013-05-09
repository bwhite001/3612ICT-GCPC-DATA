<?php
/*
 * Function definitions for list-detail example.
 */

require "includes/db_defs.php";
require "functions/shooters.php";
require "functions/series.php";
require "functions/accounts.php";

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
    require 'libs/smarty/libs/Smarty.class.php';
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
