<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

//session_start();
//if ($_SESSION['username'] == null) {
	//header('Location: /index.php');
//}

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, journalGroup, referenceId, accountName, creditDebit, amount, status, filename, comments , (select count(*) from mindthegaap.Journals b where b.journalGroup = a.journalGroup) AS 'numParts' FROM mindthegaap.Journals a ORDER BY journalGroup ASC,date DESC, creditDebit DESC, amount DESC";
$result = $conn->query($sql);
$data;
if ($result->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	//while($row = $result->fetch_assoc()) {
	//	//echo $row["firstName"] . " " . $row["lastName"];
	//}
} else {
	//echo "0 Journal Entries returned";
}
//echo "row: " . $data["firstName"] . " " . $data["lastName"];
$conn->close();
?>
