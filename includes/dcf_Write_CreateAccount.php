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
				
	$accountId = mysqli_real_escape_string($link, $_REQUEST['accountId']);
	$accountName = mysqli_real_escape_string($link, $_REQUEST['accountName']);
	$category = mysqli_real_escape_string($link, $_REQUEST['category']);
	$subcategory = mysqli_real_escape_string($link, $_REQUEST['subcategory']);
	$accountOrder = mysqli_real_escape_string($link, $_REQUEST['accountOrder']);
	$normalSide = mysqli_real_escape_string($link, $_REQUEST['normalSide']);
	$comments = mysqli_real_escape_string($link, $_REQUEST['comments']);
	
	
	
	//write event to SystemId table
	$sql = "INSERT INTO mindthegaap.SystemId (tableRelation, id) VALUES ('Accounts', '$accountId')";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}


	//write form data to Accounts database table using SystemId that was just created in query above
	$sql = "INSERT INTO mindthegaap.Accounts (accountId, accountName, category, subcategory, accountOrder, normalSide, comments, creationDate, creator, systemId) VALUES ('$accountId', '$accountName', '$category', '$subcategory','$accountOrder', '$normalSide', '$comments', NOW(), ".$_SESSION['systemId'].", (SELECT MAX(systemId) FROM mindthegaap.SystemId))";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountId to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'accountId', '', '$accountId', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountName to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'accountName', '', '$accountName', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of category to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'category', '', '$category', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of subcategory to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'subcategory', '', '$subcategory', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of accountOrder to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'accountOrder', '', '$accountOrder', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of normalSide to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'normalSide', '', '$normalSide', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of comments to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'comments', '', '$comments', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	
	header('Location: /Accounts.php');
	
	//$conn->close();
	//myslqi_close($link);	
	
?>
