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
	//New Values Read in from Edit_Accounts.php
	$newFirstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
	$newLastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
	$newPosition = mysqli_real_escape_string($link, $_REQUEST['position']);
	$newUsername = mysqli_real_escape_string($link, $_REQUEST['username']);
	$newPassword = mysqli_real_escape_string($link, $_REQUEST['password']);
	$newActive = mysqli_real_escape_string($link, $_REQUEST['active']);
		if($newActive != "Active") {
			$newActive = "Inactive";
		}
	
	
	$systemId = $_POST['editButtonSelected'];
	
	print_r($systemId);
	print_r($accountName);
	
	//reading in old Values from DB to compare the newly entered values from Edit_Accounts.php
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT firstName, lastName, position, username, password, active, systemId FROM mindthegaap.Users WHERE systemId = '$systemId'";
	print_r($sql);
	$result = $conn->query($sql);
	$oldData;
	if ($result->num_rows > 0) {
		//output data of each row
		$oldData = $result->fetch_array(MYSQLI_ASSOC); //userful for single row returns of data
		//while($row = $result->fetch_assoc()) {
		//	//echo $row["firstName"] . " " . $row["lastName"];
		//}
	} else {
		echo "0 results";
	}
	$oldFirstName = $oldData['firstName'];
	$oldLastName = $oldData['lastName']; 
	$oldPosition = $oldData['position']; 
	$oldUsername = $oldData['username'];
	$oldPassword = $oldData['password'];
	$oldActive = $oldData['active'];
	
	$conn->close();
	
	
	//Write to EventLog table from Edit_Accounts.php in database - WORKING!
	if($oldFirstName != $newFirstName) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Users', '$systemId', 'firstName', '$oldFirstName', '$newFirstName', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET firstName='$newFirstName' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$success = true;
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			$success = false;
		}
	}
	if($oldLastName != $newLastName) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Users', '$systemId', 'lastName', '$oldLastName', '$newLastName', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET lastName='$newLastName' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldPosition != $newPosition) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Users', '$systemId', 'position', '$oldPosition', '$newPosition', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET position='$newPosition' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
		//	echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldUsername != $newUsername) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Users', '$systemId', 'username', '$oldUsername', '$newUsername', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET username='$newUsername' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldPassword != $newPassword) {
		//write to EventLog
		//new password doesn't getting written to event log
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET password='$newPassword' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldActive != $newActive) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Users', '$systemId', 'active', '$oldActive', '$newActive', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Users table
		$sql = "UPDATE mindthegaap.Users SET active='$newActive' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	
	

	//$sql = "UPDATE mindthegaap.EventLog SET accountName='Test812' WHERE objectSystemId=22";
	
	header('Location: /Users_Admin.php');
	//myslqi_close($link);	
	
?>

