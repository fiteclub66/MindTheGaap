<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

//session_start();
//if ($_SESSION['username'] == null) {
//	header('Location: /index.php');
//}
include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_RetainedEarnings.php");

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

$sql_AssetsShort = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Accounts.subcategory = 'Short-Term' ORDER BY Accounts.accountOrder ASC";

$results_AssetsShort = $conn->query($sql_AssetsShort);
$data_AssetsShort;

//$accountNames;
if ($results_AssetsShort->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
}

$sql_AssetsFixed = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Accounts.subcategory = 'Long-Term' ORDER BY Accounts.accountOrder ASC";

$results_AssetsFixed = $conn->query($sql_AssetsFixed);
$data_AssetsFixed;

//$accountNames;
if ($results_AssetsFixed->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
}

$sql_LiabilitiesShort = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Liability' AND Accounts.subcategory = 'Short-Term' ORDER BY Accounts.accountOrder ASC";

$results_LiabilitiesShort = $conn->query($sql_LiabilitiesShort);
$data_LiabilitiesShort;

//$accountNames;
if ($results_LiabilitiesShort->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
}

$sql_LiabilitiesFixed = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Liability' AND Accounts.subcategory = 'Long-Term' ORDER BY Accounts.accountOrder ASC";

$results_LiabilitiesFixed = $conn->query($sql_LiabilitiesFixed);
$data_LiabilitiesFixed;

//$accountNames;
if ($results_LiabilitiesFixed->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
}



$sql_Equity = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Equity' ORDER BY Accounts.accountOrder ASC";

$results_Equity = $conn->query($sql_Equity);
$data_Equity;

//$accountNames;
if ($results_Equity->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
	
} else {
	//echo "0 Revenue results";
}

//$conn->close();
?>
