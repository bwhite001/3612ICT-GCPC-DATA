<?php
	function checkLogin($redirect)
	{
		$check = false;

		if(isset($_SESSION['user_id']))
	    {
	        $check = doesExist("admins", $_SESSION['user_id']);
	    }

	    $out = "-1";

	    if($check)
	    {
	        $out = getInfo("admins", $_SESSION['user_id']);
	    }
	    else
	    {
	        unset($_SESSION['user_id']);
	        if($redirect)
	        {
	            header("location: index.php");
	        }
	    }
	    return $out;
	}
?>