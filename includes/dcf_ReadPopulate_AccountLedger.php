<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

session_start();

//include $_SERVER['DOCUMENT_ROOT']."/test3.php";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}

$_SESSION['postedJournalPage'] = $_POST['accountName'];


if (isset($_SESSION['postedJournalPage'])) {
	$sql = "SELECT date, referenceId, creditDebit, amount FROM mindthegaap.Journals WHERE status = 'Approved' AND accountName = (SELECT accountName FROM mindthegaap.ChartOfAccounts WHERE systemid = ".$_SESSION['postedJournalPage'].") ORDER BY date DESC";
} else {
	$sql = "SELECT date, referenceId, creditDebit, amount FROM mindthegaap.Journals WHERE status = 'Approved' AND accountName = 'Cash' ORDER BY date DESC";
}

$result = $conn->query($sql);
$data;
if ($result->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
} else {
	//echo "0 results";
}

$sql2 = "SELECT accountName, accountId FROM mindthegaap.ChartOfAccounts WHERE systemId = ".$_SESSION['postedJournalPage']."";
$result2 = $conn->query($sql2);
$dataInfo;
if ($result2->num_rows > 0) {
	//output data of each row
	$dataInfo = $result2->fetch_array(MYSQLI_ASSOC); //userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
} else {
	//echo "0 results";
}

header('Location: /AccountLedger.php');
//echo "row: " . $data["firstName"] . " " . $data["lastName"];
$conn->close();
?>
