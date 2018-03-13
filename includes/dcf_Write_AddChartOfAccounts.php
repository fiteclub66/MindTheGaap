<?php 
	$servername = "localhost";
	$username = "tylerdurden";
	$password = "QxCrlmfP269g13";
	$dbname = "mindthegaap";
	
	session_start();

	$link = mysqli_connect($servername, $username, $password, $dbname);
				
	if ($link === false) {
		die("Error: Could not connect. " . mysqli_connect_error());
	}
	
	//yes, I know it says accountName, but it's cuz I linked the system ID for this so I can call other attributes based on it
	$systemId = mysqli_real_escape_string($link, $_REQUEST['accountName']);
	//$accountId = mysqli_real_escape_string($link, $_REQUEST['accountId']);
	$active;
		$isChecked = mysqli_real_escape_string($link, $_REQUEST['addCOAActive']);
		if ($isChecked == "Active") {
			$active = $isChecked;
		} else {
			$active = "Inactive";
		}
	$balance = mysqli_real_escape_string($link, $_REQUEST['addCOABalance']);
		if ($balance == "") {$balance = 0;} //makes sure balance is 0 if user leaves input box blank
	$comments = mysqli_real_escape_string($link, $_REQUEST['addCOAComments']);

	
	
	
	//write chart of accounts creation to SystemId table to get systemId for event
	$sql = "INSERT INTO mindthegaap.SystemId (tableRelation, id) VALUES ('ChartOfAccounts', (SELECT AccountId FROM mindthegaap.Accounts WHERE Accounts.systemId = '$systemId'))";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}


	//write form data to Accounts table using SystemId that was just created in query above
	$sql2 = "INSERT INTO mindthegaap.ChartOfAccounts (accountId, accountName, active, balance, comments, initiated, initiator, systemId) VALUES ((SELECT accountId FROM mindthegaap.Accounts WHERE Accounts.systemId = '$systemId'), (SELECT accountName FROM mindthegaap.Accounts WHERE Accounts.systemId = '$systemId'), '$active', '$balance', '$comments', NOW(), 1, (SELECT MAX(systemId) FROM mindthegaap.SystemId))";
	if (mysqli_query($link, $sql2)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
	}
	
	//Write Creation of accountId to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Chart of Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'accountName', '', (SELECT accountName FROM mindthegaap.Accounts WHERE Accounts.systemId = '$systemId'), ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountId to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Chart of Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'balance', '', '$balance', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountId to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Chart of Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'active', '', '$active', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountId to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Chart of Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'comments', '', '$comments', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	header('Location: /ChartOfAccounts.php');
	
	//$conn->close();
	//myslqi_close($link);	
	
?>
