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
	$newActive = mysqli_real_escape_string($link, $_REQUEST['active']);
		if($newActive != "Active") {
			$newActive = "Inactive";
		}
	$newComments = mysqli_real_escape_string($link, $_REQUEST['comments']);
	
	
	$systemId = $_POST['editButtonSelected'];
	
	print_r($systemId);
	
	
	//reading in old Values from DB to compare the newly entered values from Edit_Accounts.php
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT active, comments FROM mindthegaap.ChartOfAccounts WHERE systemId = '$systemId'";
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
		//echo "0 results";
	}
	$oldActive = $oldData['active'];
	$oldComments = $oldData['comments']; 
	
	$conn->close();
	
	
	//Write to EventLog table from Edit_Accounts.php in database - WORKING!
	if($oldActive != $newActive) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('ChartOfAccounts', '$systemId', 'active', '$oldActive', '$newActive', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in ChartOfAccounts table
		$sql = "UPDATE mindthegaap.ChartOfAccounts SET active='$newActive' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldComments != $newComments) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('ChartOfAccounts', '$systemId', 'comments', '$oldComments', '$newComments', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.ChartOfAccounts SET comments='$newComments' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	
	
	

	//$sql = "UPDATE mindthegaap.EventLog SET accountName='Test812' WHERE objectSystemId=22";
	
	header('Location: /ChartOfAccounts.php');
	//myslqi_close($link);	
	
?>
