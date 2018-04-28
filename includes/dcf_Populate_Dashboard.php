<?php 
$servername = "localhost";
$username = "tylerdurden";
$password = "QxCrlmfP269g13";
$dbname = "mindthegaap";

session_start();
//if ($_SESSION['username'] == null) {
//	header('Location: /index.php');
//}
//include ($_SERVER['DOCUMENT_ROOT']."NetIncomeCalculation.php");
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

$sql_TotalAssets = "SELECT DISTINCT(SELECT SUM(Journals.amount) FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Journals.creditDebit = 'Debit' AND Journals.status != 'Pending' AND Journals.type != 'CLO') - (SELECT SUM(Journals.amount) FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Journals.creditDebit = 'Credit' AND Journals.status != 'Pending' AND Journals.type != 'CLO') AS 'TotalAssets' FROM Journals, Accounts";

$results_TotalAssets = $conn->query($sql_TotalAssets);
$data_TotalAssets;

//$accountNames;
if ($results_TotalAssets->num_rows > 0) {
	//output data of each row
	$data_TotalAssets = $results_TotalAssets->fetch_array(MYSQLI_ASSOC); //userful for single row returns of data	
} else {
	//echo "0 TotalAssets results";
}
$totalAssets = (float)$data_TotalAssets['TotalAssets'];

//$conn->close();




//NET INCOME ////////////////////////////////////////////////////////
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
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
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
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
		
		$expenseResult2 = $conn->query($ridiculousSQL);
		
		while($expenseData2 = $expenseResult2->fetch_assoc()) { 
			//$currentNormalSide = $revenueData2['normalSide'];	
			//echo $revenueData2["accountName"]; 
			//if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
			$expenseTotal = $expenseTotal + (float)$expenseData2['balance']; 
		}	
	} else { //from if statment num_rows > 0
		//echo "0 Expense results";
	}
}


$netIncome = $revenueTotal - $expenseTotal;



//TOTAL EQUITY ////////////////////////////////////////////////////////////
$sql_Equity = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Equity' ORDER BY Accounts.accountOrder ASC";

$results_Equity = $conn->query($sql_Equity);
$data_Equity;

//$accountNames;
if ($results_Equity->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data	
} else {
	//echo "0 Revenue results";
}
 
$total_Equity = 0;								

if ($results_Equity->num_rows > 0) {
	
	while($data_Equity = $results_Equity->fetch_assoc()) { 																
		
		$currentAccount = $data_Equity['accountName'];
		$currentSystemId = $data_Equity['accountSystemId'];
		$selectedDate = $_SESSION['financialDate'];
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
		
		$results_Equity2 = $conn->query($ridiculousSQL);
		
		while($data_Equity2 = $results_Equity2->fetch_assoc()) { 
			//$currentNormalSide = $data_Equity2['normalSide'];	
			$total_Equity = $total_Equity + (float)$data_Equity2['balance'];		
		 }
	} 
} 

$total_StakeholderEquity = $total_Equity + $retainedEarnings;



// CURRENT ASSETS ///////////////////////////////////////////////////////////////////
$sql_AssetsShort = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Asset' AND Accounts.subcategory = 'Short-Term' ORDER BY Accounts.accountOrder ASC";

$results_AssetsShort = $conn->query($sql_AssetsShort);
$data_AssetsShort;

//$accountNames;
if ($results_AssetsShort->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
	
} else {
	//echo "0 Revenue results";
}


$total_ShortAssets = 0;

if ($results_AssetsShort->num_rows > 0) {

	while($data_AssetsShort = $results_AssetsShort->fetch_assoc()) { 								
		
		$currentAccount = $data_AssetsShort['accountName'];
		$currentSystemId = $data_AssetsShort['accountSystemId'];
		$selectedDate = $_SESSION['financialDate'];
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
		
		$results_AssetsShort2 = $conn->query($ridiculousSQL);
		
		while($data_AssetsShort2 = $results_AssetsShort2->fetch_assoc()) { 
			//$currentNormalSide = $data_AssetsShort2['normalSide'];
			$total_ShortAssets = $total_ShortAssets + (float)$data_AssetsShort2['balance']; 									
		
		}
	} 
} 
$currentAssets = $total_ShortAssets;



//  CURRENT LIABILITIES ////////////////////////////////////////////////////////////////

$sql_LiabilitiesShort = "SELECT DISTINCT Journals.accountName, Journals.accountSystemId FROM Journals, Accounts WHERE Journals.accountSystemId = Accounts.systemId AND Accounts.category = 'Liability' AND Accounts.subcategory = 'Short-Term' ORDER BY Accounts.accountOrder ASC";

$results_LiabilitiesShort = $conn->query($sql_LiabilitiesShort);
$data_LiabilitiesShort;

//$accountNames;
if ($results_LiabilitiesShort->num_rows > 0) {
	//output data of each row
	//$data = $result->fetch_array(MYSQLI_ASSOC); userful for single row returns of data
} else {
	//echo "0 Revenue results";
}

$total_ShortLiabilities = 0;								

if ($results_LiabilitiesShort->num_rows > 0) {
	
	while($data_LiabilitiesShort = $results_LiabilitiesShort->fetch_assoc()) { 																
			
		$currentAccount = $data_LiabilitiesShort['accountName'];
		$currentSystemId = $data_LiabilitiesShort['accountSystemId'];
		$selectedDate = $_SESSION['financialDate'];
		$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
			
		$results_LiabilitiesShort2 = $conn->query($ridiculousSQL);
			
		while($data_LiabilitiesShort2 = $results_LiabilitiesShort2->fetch_assoc()) { 
			//$currentNormalSide = $data_LiabilitiesFixed2['normalSide'];
			$total_ShortLiabilities = $total_ShortLiabilities + (float)$data_LiabilitiesShort2['balance']; 		
		}
	}
}

$currentLiabilities = $total_ShortLiabilities;



?>
