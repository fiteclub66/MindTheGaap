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


//$conn->close();
?>
