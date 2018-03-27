<?php 
session_start();
	if (isset($_POST['postedJournals'])) {
		$_SESSION['postedJournalPage'] = $_POST['editButtonSelected'];
		header('Location: PostedJournals.php');		
	} else {
		$_SESSION['editSystemId'] = $_POST['editButtonSelected'];
		header('Location: Edit_ChartOfAccounts.php');
	}

?>
