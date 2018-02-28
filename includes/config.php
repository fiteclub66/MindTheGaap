<?php

	session_start();

	//Database credentials
	$db_host="localhost";
	$db_user="tylerdurden";
	$db_pass="QxCrlmfP269g13";
	$db_name="mindthegaap";

	//Create Connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Check connection
	if ($conn->connect_error) {
		die ("Connection failed: " . $conn->connect_error);
	}
	
	
	
	//Database Connections
	//mysql_connect($db_host,$db_user, $db_pass);
	//mysql_select_db($db_name);


?>
