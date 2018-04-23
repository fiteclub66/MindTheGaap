<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

//session_start();
//if ($_SESSION['username'] == null) {
//	header('Location: /index.php');
//}
include ($_SERVER['DOCUMENT_ROOT']."/includes/NetIncomeCalculation.php");

if (isset($_POST['datetime'])) {
	$_SESSION['financialDate'] = date("Y-m-d", strtotime($_POST['datetime']));
} else {
	$_SESSION['financialDate'] = date('Y-m-d');
}
$selectedDate = $_SESSION['financialDate'];

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM mindthegaap.Journals, mindthegaap.Accounts WHERE Accounts.systemId = Journals.accountSystemId AND Accounts.category = 'Revenue'";

$results = $conn->query($sql);
$data;

//$accountNames;
if ($results->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	echo "0 Revenue results";
}

$sql2 ="SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountName = 'Dividends' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='CLO' GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountName = 'Dividends' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='CLO' GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountName = 'Dividends' AND Journals.accountSystemId = Accounts.systemId";
$results2 = $conn->query($sql2);
$data2;

if ($results2->num_rows > 0) {
	//output data of each row
	$data2 = $results2->fetch_array(MYSQLI_ASSOC); //useful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
	$data2['balance'] = 0;
}
$dividends = $data2['balance'];


$sql3 ="SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountName = 'Beginning Retained Earnings' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='CLO' GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountName = 'Beginning Retained Earnings' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='CLO' GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountName = 'Beginning Retained Earnings' AND Journals.accountSystemId = Accounts.systemId";
$results3 = $conn->query($sql2);
$data2;

if ($results3->num_rows > 0) {
	//output data of each row
	$data3 = $results3->fetch_array(MYSQLI_ASSOC); //useful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
	$data3['balance'] = 0;
}
$beginningRE = $data3['balance'];

//$netIncome = $netIncome;

$retainedEarnings = $beginningRE + $netIncome - $dividends;



$conn->close();
?>
