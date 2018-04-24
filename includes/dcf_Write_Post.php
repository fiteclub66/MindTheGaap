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
	//New Values Read in from Post.php
	//$newInput = mysqli_real_escape_string($link, $_REQUEST['rejectReason']);
	$rejectReason = mysqli_real_escape_string($link, $_REQUEST['rejectReason']);	
		
	$journalGroup = $_POST['editButtonSelected'];
	$newStatus = $_POST['approveRejectedButton'];
	
	
	
	//print_r($journalGroup);
	//print_r($newStatus);
	
	
	//reading in old Values from DB to compare the newly entered values from Edit_Accounts.php
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT status, comments FROM mindthegaap.Journals WHERE journalGroup = '$journalGroup' GROUP BY journalGroup";
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
	$oldStatus = $oldData['status'];
	$oldComments = $oldData['comments'];
	$newComments = $oldComments . $rejectReason;
	$conn->close();
	
	
	//Write to EventLog table from Post.php in database - WORKING!
	if($oldStatus != $newStatus) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'accountId', '$oldStatus', '$newStatus', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
		//	echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Journals table
		$sql = "UPDATE mindthegaap.Journals SET status='$newStatus' WHERE journalGroup='$journalGroup'";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	
	if($oldComments != $newComments) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'comments', '$oldComments', '$newComments', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Journals table
		$sql = "UPDATE mindthegaap.Journals SET comments='$newComments' WHERE journalGroup='$journalGroup'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	
	

	//$sql = "UPDATE mindthegaap.EventLog SET accountName='Test812' WHERE objectSystemId=22";
	
	header('Location: /Post.php');
	//myslqi_close($link);	
	
?>

