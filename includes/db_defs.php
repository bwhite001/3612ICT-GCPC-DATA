<?php
/* 
 * Database access functions. 
 */

include "mysql.php";
include "crud.php";

/* Show MySQL error. */
function show_error() {
  die("Error ". mysql_errno() . " : " . mysql_error());
}

/* Open connection and select database. */
function mysql_open() {
  $connection = @ mysql_connect(HOST, USER, PASSWORD)
      or die("Could not connect");
  mysql_select_db(DATABASE, $connection)
      or show_error();
  return $connection;
}

function sqlQuery($query)
{
	$server = mysql_open();

	$result = mysql_query($query) or show_error();;

	mysql_close($server);

	return $result;

}

function getSqlCount($query)
{
	$server = mysql_open();
	$result = mysql_query($query);

	mysql_close($server);

	return mysql_num_rows($result);
}
function getArray($table, $query)
  {

    $outArray = array();
    if($table == "-1")
    {
      if(isset($query))
      {
        $q = $query;
      }
      else
      {
        $q = "";
      }
    }
    else
    {
      $q = "SELECT * FROM `".$table."`";
    }
    $result = sqlQuery($q);
    if(isset($result))
    {
      while($row = mysql_fetch_array($result))
      {
        array_push($outArray, $row);      
      }

      return $outArray;
    }
    else
    {
      return array('id'=>"error");
    }
  }
  function getInfo($type, $id)
  {
    if($type == "-1")
    {
      if(isset($id))
      {
        $sql = $id;
      }
      else
      {
        $sql = "";
      }
    }
    else
    {
      $sql = "SELECT * FROM `".$type."` WHERE id = ".$id;
    }
    $resultsArray = sqlQuery($sql);

    $result = mysql_fetch_assoc($resultsArray);

    return $result;
  }
  function doesExist($table, $id)
  {
    if($table == "-1")
    {
      if(isset($id))
      {
        $sql = $id;
      }
      else
      {
        $sql = "";
      }
    }
    else
    {
      $sql = "SELECT * FROM `".$table."` WHERE id = ".$id;
    }
      $count = getSqlCount($sql);

      if($count == 1)
        return true;
      else
        return false;
  }
  function getInputData($dataName)
  {  
    if(isset($_SESSION[$dataName])) 
      {
          $out = $_SESSION[$dataName];
      }
      else if(isset($_POST[$dataName])) 
      {
          $out = $_POST[$dataName];
      }
      else if(isset($_GET[$dataName]))
      {
          $out = $_GET[$dataName];
      }
      else if(isset($_REQUEST[$dataName]))
      {
          $out = $_REQUEST[$dataName];
      }
      else
      {
          $out = "";
      }
      return $out;
  }
?>
