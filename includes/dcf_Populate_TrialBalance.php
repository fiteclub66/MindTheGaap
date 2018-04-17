<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

//session_start();
if ($_SESSION['username'] == null) {
	header('Location: /index.php');
}

if (isset($_POST['datetime'])) {
	$_SESSION['financialDate'] = date("Y-m-d", strtotime($_POST['datetime']));
} else {
	$_SESSION['financialDate'] = date('Y-m-d');
}

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM mindthegaap.Journals, mindthegaap.Accounts WHERE Journals.accountSystemId = Accounts.systemId ORDER BY Accounts.accountOrder ASC";

$result = $conn->query($sql);
$result2;
$data;
//$accountNames;
if ($result->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
	//while($data = $result->fetch_assoc()) {
		
		//$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountName = 'Cash' AND Journals.status = 'Approved' AND Journals.date < '2018-04-11' GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountName = 'Cash' AND Journals.status = 'Approved' AND Journals.date < '2018-04-11' GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountName = 'Cash' AND Journals.accountSystemId = Accounts.systemId";
		
		
		
		//$result2 = $conn->query($ridiculousSQL);
		//array_push($result2, $conn->query($ridiculousSQL));
	//}
	
	
} else {
	echo "0 results";
}


//$conn->close();
?>
