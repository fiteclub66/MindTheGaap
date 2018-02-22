<?php

	session_start();

	//Database credentials
	$db_host="127.0.0.1";
	$db_user="root";
	$db_pass="";
	$db_name="mindthegaap";

	//Datatbase Connections
	mysql_connect($db_host,$db_user, $db_pass);
	mysql_select_db($db_name);


?>