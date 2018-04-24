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

$sql = "SELECT ChartOfAccounts.accountName, ChartOfAccounts.accountId, ChartOfAccounts.balance, ChartOfAccounts.active, Accounts.category, Accounts.subcategory, Accounts.normalSide, ChartOfAccounts.systemId FROM mindthegaap.ChartOfAccounts, mindthegaap.Accounts WHERE ChartOfAccounts.linkedAccount = Accounts.systemId ORDER BY accountOrder";
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
//echo "row: " . $data["firstName"] . " " . $data["lastName"];
$conn->close();
?>
