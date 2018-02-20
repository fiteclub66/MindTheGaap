<?php
	session_start();

	//session out
	unset($_SESSION['logged']);
	unset($_SESSION['user_id']);
	unset($_SESSION['user_type']);
	header("location: index.php");
	exit();
?>