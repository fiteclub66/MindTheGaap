<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

//session_start();
//if ($_SESSION['username'] == null) {
//	header('Location: /index.php');
//}
//include ($_SERVER['DOCUMENT_ROOT']."NetIncomeCalculation.php");

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

$sql_TotalAssets = "SELECT DISTINCT(SELECT SUM(Journals.amount) FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Journals.creditDebit = 'Debit') - (SELECT SUM(Journals.amount) FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Journals.creditDebit = 'Credit') AS 'TotalAssets' FROM Journals, Accounts";

$results_TotalAssets = $conn->query($sql_TotalAssets);
$data_TotalAssets;

//$accountNames;
if ($results_TotalAssets->num_rows > 0) {
	//output data of each row
	$data_TotalAssets = $results_TotalAssets->fetch_array(MYSQLI_ASSOC); //userful for single row returns of data
	//echo $results_TotalAssets;
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	echo "0 TotalAssets results";
}
$totalAssets = (float)$data_TotalAssets['TotalAssets'];

$conn->close();
?>
