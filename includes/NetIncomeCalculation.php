<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

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

$sqlRevenueAccounts = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM mindthegaap.Journals, mindthegaap.Accounts WHERE Accounts.systemId = Journals.accountSystemId AND Accounts.category = 'Revenue' ORDER BY Accounts.accountOrder ASC";

$revenueAccountResults = $conn->query($sqlRevenueAccounts);
$revenueAccountData;

//$accountNames;
//if ($revenueAccountResults->num_rows > 0) {
$revenueTotal = 0;
	

if ($revenueAccountResults->num_rows > 0) {									

	while($revenueAccountData = $revenueAccountResults->fetch_assoc()) { 							
		
		$currentAccount = $revenueAccountData['accountName'];
		$currentSystemId = $revenueAccountData['accountSystemId'];
		$selectedDate = $_SESSION['financialDate'];
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
		$revenueResult2 = $conn->query($ridiculousSQL);
									
		while($revenueData2 = $revenueResult2->fetch_assoc()) { 
			$currentNormalSide = $revenueData2['normalSide'];
			//echo $revenueData2["accountName"];
			$revenueTotal = $revenueTotal + (float)$revenueData2['balance']; 										
		}
	} 
} 



$sqlExpenseAccounts = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM mindthegaap.Journals, mindthegaap.Accounts WHERE Accounts.systemId = Journals.accountSystemId AND Accounts.category = 'Expense' ORDER BY Accounts.accountOrder ASC";

$expenseAccountResults = $conn->query($sqlExpenseAccounts);
$expenseAccountData;

//$accountNames;
//if ($revenueAccountResults->num_rows > 0) {
$expenseTotal = 0;

while($expenseAccountData = $expenseAccountResults->fetch_assoc()) { 
if ($expenseAccountResults->num_rows > 0) {							

	
		
		$currentAccount = $expenseAccountData['accountName'];
		$currentSystemId = $expenseAccountData['accountSystemId'];
		$selectedDate = $_SESSION['financialDate'];
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
		
		$expenseResult2 = $conn->query($ridiculousSQL);
		
		while($expenseData2 = $expenseResult2->fetch_assoc()) { 
			//$currentNormalSide = $revenueData2['normalSide'];	
			//echo $revenueData2["accountName"]; 
			//if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
			$expenseTotal = $expenseTotal + (float)$expenseData2['balance']; 
		}	
	} else { //from if statment num_rows > 0
		echo "0 Expense results";
	}
}


$netIncome = $revenueTotal - $expenseTotal;

$conn->close();
?>
