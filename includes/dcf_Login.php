<?php

	$servername = "localhost";
	$username = "tylerdurden";
	$password = "QxCrlmfP269g13";
	$dbname = "mindthegaap";

	$connection = mysqli_connect($servername, $username, $password);
	if(!$connection){
		die("Database Connection Fail");
	}
	$select_db = mysqli_select_db($connection, $dbname);
	if(!$select_db){
		die("database Connection Failed" . mysqli_error($connection));
	}

	
?>
