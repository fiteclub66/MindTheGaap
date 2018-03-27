<?php
	session_start();
	
	unset($_SESSION['username']);
	unset($_SESSION['firstName']);
	unset($_SESSION['position']);
	unset($_SESSION['userId']);
	unset($_SESSION['systemId']);
	unset($_SESSION['postedJournalPage']);
	
	session_unset();
	session_destroy();
	
	session_start();
	$_SESSION['loggedOut'] = true;
	
	header('Location: /index.php');	
?>
