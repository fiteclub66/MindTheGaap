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
				
	$firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
	$lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
	$position = mysqli_real_escape_string($link, $_REQUEST['position']);
	$username = mysqli_real_escape_string($link, $_REQUEST['username']);
	$password = mysqli_real_escape_string($link, $_REQUEST['password']);
	$active;
		$isChecked = mysqli_real_escape_string($link, $_REQUEST['active']);
		if ($isChecked == "Active") {
			$active = $isChecked;
		} else {
			$active = "Inactive";
		}
	$securityAnswer1 = mysqli_real_escape_string($link, $_REQUEST['securityAnswer1']);
	$securityAnswer2 = mysqli_real_escape_string($link, $_REQUEST['securityAnswer2']);
	$securityAnswer3 = mysqli_real_escape_string($link, $_REQUEST['securityAnswer3']);
	
	
	//write event to SystemId table
	$sql = "INSERT INTO mindthegaap.SystemId (tableRelation, id) VALUES ('Users', (SELECT (MAX(userId) + 1) FROM mindthegaap.Users))";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
		$success = true;
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		$success = false;
	}


	//write form data to Accounts table using SystemId that was just created in query above
	$sql = "INSERT INTO mindthegaap.Users (firstName, lastName, position, username, password, active, systemId, securityAnswer1, securityAnswer2, securityAnswer3) VALUES ('$firstName', '$lastName', '$position','$username', '$password', '$active', (SELECT MAX(systemId) FROM mindthegaap.SystemId), '$securityAnswer1','$securityAnswer2', '$securityAnswer3')";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of firstName to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'firstName', '', '$firstName', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of lastName to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'lastName', '', '$lastName', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of position to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'position', '', '$position', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of username to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'username', '', '$username', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	//Write Creation of active to EventLog
	$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', (SELECT MAX(systemId) FROM mindthegaap.SystemId), 'active', '', '$active', ".$_SESSION['systemId'].", NOW())";
	if (mysqli_query($link, $sql)) {
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	if($success){
		$successQString = '?addsuccess=true';
	}else{
		$successQString =  '?addsuccess=false';
	}
	
	
	header('Location: /Users_Admin.php'.$successQString);
	
	//$conn->close();
	//myslqi_close($link);	
	
?>
