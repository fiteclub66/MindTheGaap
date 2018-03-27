<?php 

session_start();

$_SESSION['postedJournalPage'] = $_POSTED['accountName'];


header('Location: /PostedJournals.php');

//echo "row: " . $data["firstName"] . " " . $data["lastName"];
$conn->close();
?>
