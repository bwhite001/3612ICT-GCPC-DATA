<?php
/*
 * Function definitions for list-detail example.
 */

require "includes/db_defs.php";
require "functions/shooters.php";
require "functions/series.php";
require "functions/accounts.php";
require "functions/scores.php";
require "functions/stats.php";
require "functions/json.php";

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
 function pagination($query, $current_page, $qty_per_page, $order)
 {
        $total_objects = getSqlCount($query);

        $total_pages = ceil($total_objects/$qty_per_page);

        if($current_page < 1)
        {
                $current_page = 1;
        }
        else if($total_pages > 0 && $current_page > $total_pages)
        {
                $current_page = $total_pages;
        }
        
        $offset = ($current_page-1) * $qty_per_page;
        if($order != "")
            $query .= " ORDER BY $order LIMIT $offset, $qty_per_page;";
        else
            $query .= " LIMIT $offset, $qty_per_page;";

        $objects = getArray("-1", $query);

        return array($objects, $total_pages, $current_page);
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
