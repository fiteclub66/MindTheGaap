<?php 
session_start();
	if (isset($_POST['postedJournals'])) {
		$_SESSION['postedJournalPage'] = $_POST['editButtonSelected'];
		header('Location: AccountLedger.php');		
	} else {
		$_SESSION['editSystemId'] = $_POST['editButtonSelected'];
		header('Location: Edit_ChartOfAccounts.php');
	}

?>
