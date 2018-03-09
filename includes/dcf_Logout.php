<?php
	session_start();
	
	unset($_SESSION['username']);
	unset($_SESSION['firstName']);
	unset($_SESSION['userId']);
	unset($_SESSION['SystemId']);
	session_destroy();
	header('Location: /index.php');


?>
