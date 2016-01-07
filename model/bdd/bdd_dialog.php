<?php 
	function askBDD(){
		$host = "localhost";
		$user = "root";
		$pass = "";

		$databaseName = "animal";
		$tableName = "quoala";

		$con = mysql_connect($host,$user,$pass);
		$dbs = mysql_select_db($databaseName, $con);

		$result = mysql_query("SELECT * FROM $tableName where id = ".$_GET['id']);
		$array = mysql_fetch_row($result);	// TODO fetch_assoc

		$jArray = json_encode($array);
		return $jArray;
	}

	if($_GET['xhr'] == 1) echo askBDD(); exit();
?>