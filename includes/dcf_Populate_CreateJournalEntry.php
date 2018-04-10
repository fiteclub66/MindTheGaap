<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

session_start();


//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ChartOfAccounts.accountName, ChartOfAccounts.systemId, ChartOfAccounts.accountId, ChartOfAccounts.linkedAccount, Accounts.systemId FROM mindthegaap.ChartOfAccounts, mindthegaap.Accounts WHERE ChartOfAccounts.linkedAccount = Accounts.systemId AND Accounts.normalSide = 'Left'";
$result = $conn->query($sql);
$dataDebits;
if ($result->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
} else {
	echo "0 results";
}

//$sql3 = "SELECT ChartOfAccounts.accountName, ChartOfAccounts.systemId, ChartOfAccounts.accountId, ChartOfAccounts.linkedAccount, Accounts.systemId FROM mindthegaap.ChartOfAccounts, mindthegaap.Accounts WHERE ChartOfAccounts.linkedAccount = Accounts.systemId AND Accounts.normalSide = 'Left'";
//$result3 = $conn->query($sql3);
//$dataDebits;
//if ($result3->num_rows > 0) {
	////output data of each row
	////$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	////while($row = $result->fetch_assoc()) {
	////	//echo $row["firstName"] . " " . $row["lastName"];
	////}
//} else {
	//echo "0 results";
//}

$sql2 = "SELECT ChartOfAccounts.accountName, ChartOfAccounts.systemId, ChartOfAccounts.accountId, ChartOfAccounts.linkedAccount, Accounts.systemId FROM mindthegaap.ChartOfAccounts, mindthegaap.Accounts WHERE ChartOfAccounts.linkedAccount = Accounts.systemId AND Accounts.normalSide = 'Right'";
$result2 = $conn->query($sql2);
$dataCredits;
if ($result2->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
} else {
	echo "0 results";
}


//echo "row: " . $data["firstName"] . " " . $data["lastName"];
$conn->close();
?>

