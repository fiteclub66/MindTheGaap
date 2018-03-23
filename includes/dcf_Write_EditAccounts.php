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
	$accountId = mysqli_real_escape_string($link, $_REQUEST['accountId']);
	$accountName = mysqli_real_escape_string($link, $_REQUEST['accountName']);
	$category = mysqli_real_escape_string($link, $_REQUEST['category']);
	$subcategory = mysqli_real_escape_string($link, $_REQUEST['subcategory']);
	$accountOrder = mysqli_real_escape_string($link, $_REQUEST['accountOrder']);
	$normalSide = mysqli_real_escape_string($link, $_REQUEST['normalSide']);
	$comments = mysqli_real_escape_string($link, $_REQUEST['comments']);
	
	
	$systemId = $_POST['editButtonSelected'];
	
	print_r($systemId);
	
	
	//reading in old Values from DB to compare the newly entered values from Edit_Accounts.php
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT accountId, accountName, category, subcategory, accountOrder, normalSide, comments FROM mindthegaap.Accounts WHERE systemId = '$systemId'";
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
	$oldAccountId = $oldData['accountId'];
	$oldAccountName = $oldData['accountName']; 
	$oldCategory = $oldData['category']; 
	$oldSubcategory = $oldData['subcategory'];
	$oldAccountOrder = $oldData['accountOrder'];
	$oldNormalSide = $oldData['normalSide'];
	$oldComments = $oldData['comments'];
	
	$conn->close();
	
	
	//Write to EventLog table from Edit_Accounts.php in database - WORKING!
	if($oldAccountId != $accountId) {
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'accountId', '$oldAccountId', '$accountId', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET accountId='$accountId' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldAccountName != $accountName) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'accountName', '$oldAccountName', '$accountName', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET accountName='$accountName' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in ChartOfAccounts table
		$sql = "UPDATE mindthegaap.ChartOfAccounts SET accountName='$accountName' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldCategory != $category) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'category', '$oldCategory', '$category', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET category='$category' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldSubcategory != $subcategory) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'subcategory', '$oldSubcategory', '$subcategory', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET subcategory='$subcategory' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldAccountOrder != $accountOrder) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'accountOrder', '$oldAccountOrder', '$accountOrder', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET accountOrder='$accountOrder' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldNormalSide != $normalSide) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'normalSide', '$oldNormalSide', '$normalSide', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET normalSide='$normalSide' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	if($oldComments != $comments) {
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Accounts', '$systemId', 'comments', '$oldComments', '$comments', ".$_SESSION['systemId'].", NOW())";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		//make edit in Accounts table
		$sql = "UPDATE mindthegaap.Accounts SET comments='$comments' WHERE systemId='$systemId'";
		if (mysqli_query($link, $sql)) {
			echo "Records added successfully.";
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	
	

	//$sql = "UPDATE mindthegaap.EventLog SET accountName='Test812' WHERE objectSystemId=22";
	
	header('Location: /Accounts.php');
	//myslqi_close($link);	
	
?>
