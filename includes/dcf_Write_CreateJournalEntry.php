<?php

session_start();

//echo "<html><head></head><body><div>";

//for ($i = 0; $i < 5; $i++) {
//	$question = ${'variable'.$i};
//	$$question = $i;
//}

$numDebits = $_POST["numDebits"];
//echo "numDebits: " . $numDebits ."</br>";
//$validDebitInts = [];

//for ($i = 0; $i < $numDebits; $i++) {
//	$a = 'debit'.$i;
	//echo $a;
//	if (isset($_POST['debit'.$i])) {
//		$$a=$_POST[$a];
//		array_push($validDebitInts, $i);
//	}
	//echo $a."<br>";
//}
//$cdebit3 = 12;
//echo "</br>debit0: " . $debit0;
//echo "</br>debit1: " . $debit1;
//echo "</br>debit2: " . $debit2;
//echo "</br>debit3: " . $debit3;
//echo "</br>debit4: " . $debit4;
//print_r($validDebitInts);

//for ($j = 0; $j < count($validDebitInts); $j++) {
//	echo $validDebitInts[$j];
//}
//echo "</br>count of validDebitInts: " . count($validDebitInts);
//$a = 'debit'.$i;
//	if (isset($_POST[''.$aa.''])) {
//		echo "</br>".$_POST[$aa];
//	}
//}


//echo "</br></br></br></br>";

$numCredits = $_POST['numCredits'];
//echo "numCredits: " . $numCredits ."</br>";
//$validCreditInts = [];

//for ($i = 0; $i < $numCredits; $i++) {
//	$a = 'credit'.$i;
	//echo $a;
//	if (isset($_POST['credit'.$i])) {
//		$$a=$_POST[$a];
//		array_push($validCreditInts, $i);
//	}
	//echo $a."<br>";
//}
//print_r($validDebitInts);

//for ($j = 0; $j < count($validCreditInts); $j++) {
//	echo $validCreditInts[$j];
//}
//echo "</br>count of validCreditInts: " . count($validCreditInts);

//echo "</br></br></br></br>";

//$var0 = isset($_POST['credit'.$i]);
//echo "credit0: " . $_POST['credit'.$i];
//$var1 = isset($_POST['credit1']);
//echo "</br>var1: ".$var1;
//echo "</br>var0: ".$var0;
//$i = 0;
//echo "</br></br>";
//$date = mysqli_real_escape_string($link, $_REQUEST['datetime']);

$badDate = $_POST['datetime'];
echo "bad date: " . $badDate . "</br>";
//$date = date("Y-m-d", $badDate);
//echo "date: " . $date . "</br>";

$myDateTime = DateTime::createFromFormat('m-d-Y', $badDate);
$date = $myDateTime->format('Y-m-d'); //newDateString is a string
echo ("newDateString: " . $date . "</br>");
//$date = datetime::createfromformat('Y-m-d', $newDateString);
//echo (getType($finalDate));
//echo "finalDate: " . $date . "</br>";


$type = $_POST['type'];
//echo "type: " . $type . "</br>";
$comments = $_POST['description'];
//echo "comments: " . $comments . "</br>";
//for ($k = 0; $k < $numDebits; $k++) {
	//$a = 'debit'.$i;
//	if (isset($_POST['debit'.$k])) {
//		$debitAccountName = $_POST['debitAccountName'.$k];
//		echo "debitAccountName: " . $debitAccountName . "</br>";
//		$debitAmount = $_POST['debit'.$k];
//		echo "debitAmount: " . $debitAmount . "</br>";
//	}
//}
//$creditAccountName = $_POST['creditAccountName'.$i];
//echo "creditAccountName0: " . $creditAccountName . "</br>";
//$creditAmount = $_POST['credit'.$i];
//echo "creditAmount0: " . $creditAmount . "</br>";

$successfulQueries = 0;

$servername = "localhost";
	$username = "tylerdurden";
	$password = "QxCrlmfP269g13";
	$dbname = "mindthegaap";

//reading in old Values from DB to compare the newly entered values from Edit_Accounts.php
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT MAX(journalGroup) as 'maxNum' FROM mindthegaap.Journals";
	//print_r($sql);
	$result = $conn->query($sql);
	$query1;
	if ($result->num_rows > 0) {
		//output data of each row
		$query1 = $result->fetch_array(MYSQLI_ASSOC); //userful for single row returns of data
		//while($row = $result->fetch_assoc()) {
		//	//echo $row["firstName"] . " " . $row["lastName"];
		//}
	} else {
		echo "0 results";
	}
	$journalGroup = intval($query1['maxNum']) + 1;
	echo "journalGroup: ". $journalGroup . "</br>";
	
	$conn->close();



$link = mysqli_connect($servername, $username, $password, $dbname);
				
	if ($link === false) {
		die("Error: Could not connect. " . mysqli_connect_error());
	}


for ($k = 0; $k < $numDebits; $k++) {
	//$a = 'debit'.$i;
	if (isset($_POST['debit'.$k])) {
		$debitAccountName = $_POST['debitAccountName'.$k];
		//echo "debitAccountName: " . $debitAccountName . "</br>";
		$debitAmount = $_POST['debit'.$k];
		//echo "debitAmount: " . $debitAmount . "</br>";
		//write to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'journalGroup', '', '$journalGroup', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'accountName', '', (SELECT accountName FROM mindthegaap.Accounts WHERE systemId = '$debitAccountName'), ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'creditDebit', '', 'debit', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'amount', '', '$debitAmount', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'type', '', '$type', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'status', '', 'Pending', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'comments', '', '$comments', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	

		
		//insert new data into Journals table
		$sql = "INSERT INTO mindthegaap.Journals(journalGroup, date, accountName, creditDebit, amount, type, status, comments, creator, accountSystemId) VALUES ('$journalGroup', '$date', (SELECT accountName FROM mindthegaap.Accounts WHERE systemId='$debitAccountName'), 'debit', '$debitAmount', '$type', 'Pending', '$comments', ".$_SESSION['systemId'].", '$debitAccountName')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
}

	
	
for ($x = 0; $x < $numCredits; $x++) {
	//$a = 'debit'.$i;
	if (isset($_POST['credit'.$x])) {
		$creditAccountName = $_POST['creditAccountName'.$x];
		//echo "creditAccountName: " . $creditAccountName . "</br>";
		$creditAmount = $_POST['credit'.$x];
		//echo "creditAmount: " . $creditAmount . "</br>";
			
		//write CREDIT to EventLog
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'journalGroup', '', '$journalGroup', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'accountName', '', (SELECT accountName FROM mindthegaap.Accounts WHERE systemId='$creditAccountName'), ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'creditDebit', '', 'credit', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'amount', '', '$creditAmount', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'type', '', '$type', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'status', '', 'Pending', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
		$sql = "INSERT INTO mindthegaap.EventLog (tablename, objectSystemId, changeField, beforeValue, afterValue, editorSystemId, time) VALUES ('Journals', 0, 'comments', '', '$comments', ".$_SESSION['systemId'].", '$date')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}


		//insert new data into Journals table
		$sql = "INSERT INTO mindthegaap.Journals(journalGroup, date, accountName, creditDebit, amount, type, status, comments, creator, accountSystemId) VALUES ('$journalGroup', '$date', (SELECT accountName FROM mindthegaap.Accounts where systemId='$creditAccountName'), 'credit', '$creditAmount', '$type', 'Pending', '$comments', ".$_SESSION['systemId'].", '$creditAccountName')";
		if (mysqli_query($link, $sql)) {
			//echo "Records added successfully.";
			$successfulQueries++;
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
}
		
		
echo "</br></br># Successful Queries: " . $successfulQueries . "</br>";

echo "</div></body></html>";

 header('Location: /Journal.php');

?>
