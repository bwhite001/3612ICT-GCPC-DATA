<?php
    // Basic CRUD Functions

    //Creates a query from an assoitive array.
    function createQuery($table, $data)
    {
    	$columns = "(";
    	$values = "VALUES (";

    	foreach ($data as $key => $value) {
    			$columns = $columns."`".$key."`,";
    			$values = $values."'".$value."',";
    	}

    	
    	$columns = rtrim($columns, ",").") ";
		$values = rtrim($values, ",").");";


    	$sql = "INSERT INTO `".$table."` ".$columns.$values;

    	$r = sqlQuery($sql);

    	return $sql;
    }
    //Creates a query from an assoitive array.
    function updateQuery($table, $id, $data)
    {

        $columns = "";

        foreach ($data as $key => $value) {
                $columns = $columns."`".$key."` = '".$value."',";
        }

        
        $columns = rtrim($columns, ",");


        $sql = "UPDATE `".$table."` SET ".$columns." WHERE `".$table."`.`id` = ".$id.";";

        $r = sqlQuery($sql);

        return $sql;
    }
    //Returns a json file NOT IMPLEMENTED IN THIS ASSIGNMENT
    function getData($table)
    {
    	$id = (isset($_POST["id"])) ? $_POST["id"] : $_GET["id"];

    	$data = json_encode(getInfo($table, $id));

    	return $data;
    }
    //Deletes stuff from a database give the table name and id
    function deleteStuff($table, $id)
    {   
        
        $check = doesExist($table, $id);

        $sql = "DELETE FROM `".$table."` WHERE `".$table."`.`id` =".$id;
        if($check)
        {
            sqlQuery($sql);
        }

        return "id: ".$id."\n Query: ".$sql;
    }
?>