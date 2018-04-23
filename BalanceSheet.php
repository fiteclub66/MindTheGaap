<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
	if(!empty($_GET['date'])){
    $date = $_GET['date'];
	}else{
		$date = "";
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_BalanceSheet.php"); ?>

<html lang="en">
	<head>
		<title>Balance Sheet</title>
		<style>
			tr {
				height: 30px;
			}
		</style>
	
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating --> 
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php"); ?>

	<body style="background-color:#FFFFFF">
	
			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php"); ?>	
		<div class="container">
			<!--<form action="includes/dcf_Write_Post.php" method="post"> -->
			<div class="row" style="margin-top: 30px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<!--<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">BALANCE SHEET</h1>
				</div> -->
				
			</div>
			<div style="text-align: center;" id="tester">
				<h3>Company Name</h3>
				<h4>Balance Sheet</h4>
				<!--<h6>For the Period Ending on </?php echo date("m/d/Y"); ?></h6> -->
<!--
				<h6>For the Period Ending on <span id="dateInsert" name="dateInsert" onload="test()"></span></h5>
-->
			<h6>As of <?php $dummyDate = $_SESSION['financialDate']; echo date("m/d/Y", strtotime($dummyDate));?></h5>
			</div>
			<form action="BalanceSheet.php" method="post">
			<div class="row">
				<div class="col-xs-0 col-sm-0 col-md-7 col-lg-9"></div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-3">
					<div class="input-group date" id="datetimepicker6" data-target-input="nearest" style="padding-right: 20px">
						<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker6" size="12" id="datetime" name="datetime"/>
						<div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker"> 
							<div class="input-group-text" style="padding-left: 5px"><i class="fa fa-calendar fa-2x" style="padding-top: 3px"></i></div>
						</div>
						<button type="submit" class="btn btn-success" style="margin-left: 8px;">Go</button>
					</div>
				</div>
			</div>
			</form>
			<div>
				<!--</?php print_r($result); ?> -->
				<table id="example" name="example" class="display" cellspacing="10" width="50%" style="margin-left: auto; margin-right: auto;"> <!--color: #DD9787 -->
						<thead>
							<tr>
								<th width="60%" style="color: white;">&nbsp;</th>
								<th width="20%" style="text-align: center;">&nbsp;</th>
								<th width="20%" style="text-align: center;">&nbsp;</th>
							</tr>
						</thead>						
						<tbody style="margin-bottom: 10px;">
							<tr>
								<td><b>Assets</b></td>
							</tr>
							<tr>
								<td style="padding-left: 35px">Current Assets</td>
							</tr>
							<?php 
								$firstEntry = true;
								$total_ShortAssets = 0;
								
								if ($results_AssetsShort->num_rows > 0) {
								
									while($data_AssetsShort = $results_AssetsShort->fetch_assoc()) { 								
									
									$currentAccount = $data_AssetsShort['accountName'];
									$currentSystemId = $data_AssetsShort['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$results_AssetsShort2 = $conn->query($ridiculousSQL);
									
									while($data_AssetsShort2 = $results_AssetsShort2->fetch_assoc()) { 
										$currentNormalSide = $data_AssetsShort2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 70px;"><?php echo $data_AssetsShort2["accountName"]; ?></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $total_ShortAssets = $total_ShortAssets + (float)$data_AssetsShort2['balance']; if($firstEntry == true){echo "$ &nbsp;"; $firstEntry = false;} $data_AssetsShort2['balance'] = number_format((float)$data_AssetsShort2['balance'], 2, ".", ","); if (substr($data_AssetsShort2['balance'], 0, 1) == "-"){ $data_AssetsShort2['balance'] = str_replace("-", "(", $data_AssetsShort2['balance']); $data_AssetsShort2['balance'] = $data_AssetsShort2['balance'] . ")"; echo $data_AssetsShort2['balance']; } else {echo $data_AssetsShort2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Total Current Assets</td>
								<td style="border-top: solid 1px; text-align: right;"></td>
								<td style="text-align: right;"><?php echo "$ &nbsp" . number_format($total_ShortAssets, 2, ".", ","); ?></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Fixed Assets</td>
								<td></td>
								<td></td>
							</tr>
						<?php 
								$firstEntry = true;
								$total_FixedAssets = 0;
								
								if ($results_AssetsFixed->num_rows > 0) {
								
									while($data_AssetsFixed = $results_AssetsFixed->fetch_assoc()) { 						
									
									$currentAccount = $data_AssetsFixed['accountName'];
									$currentSystemId = $data_AssetsFixed['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$results_AssetsFixed2 = $conn->query($ridiculousSQL);
									
									while($data_AssetsFixed2 = $results_AssetsFixed2->fetch_assoc()) { 
										$currentNormalSide = $data_AssetsFixed2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 70px;"><?php echo $data_AssetsFixed2["accountName"]; ?></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $total_FixedAssets = $total_FixedAssets + (float)$data_AssetsFixed2['balance']; $data_AssetsFixed2['balance'] = number_format((float)$data_AssetsFixed2['balance'], 2, ".", ","); if (substr($data_AssetsFixed2['balance'], 0, 1) == "-"){ $data_AssetsFixed2['balance'] = str_replace("-", "(", $data_AssetsFixed2['balance']); $data_AssetsFixed2['balance'] = $data_AssetsFixed2['balance'] . ")"; echo $data_AssetsFixed2['balance']; } else {echo $data_AssetsFixed2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Total Fixed Assets</td>
								<td style="border-top: solid 1px;"></td>
								<td style="text-align: right;"><?php echo number_format($total_FixedAssets, 2, ".", ","); ?></td>		
							</tr>
							<tr><td><b>Total Assets</b></td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: double 3px;"><?php $totalAssets = $total_ShortAssets + $total_FixedAssets; echo number_format($totalAssets, 2, ".", ","); ?></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td><b>Liabilites and Stockholder's Equity</b></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Liabilities</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Current Liabilities</td>
								<td></td>
								<td></td>
							</tr>
							<?php 
								$firstEntry = true;
								$total_ShortLiabilities = 0;								
								
								if ($results_LiabilitiesShort->num_rows > 0) {
									
									while($data_LiabilitiesShort = $results_LiabilitiesShort->fetch_assoc()) { 																
									
									$currentAccount = $data_LiabilitiesShort['accountName'];
									$currentSystemId = $data_LiabilitiesShort['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$results_LiabilitiesShort2 = $conn->query($ridiculousSQL);
									
									while($data_LiabilitiesShort2 = $results_LiabilitiesShort2->fetch_assoc()) { 
										$currentNormalSide = $data_LiabilitiesFixed2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 70px;"><?php echo $data_LiabilitiesShort2["accountName"]; ?></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $total_ShortLiabilities = $total_ShortLiabilities + (float)$data_LiabilitiesShort2['balance']; $data_LiabilitiesShort2['balance'] = number_format((float)$data_LiabilitiesShort2['balance'], 2, ".", ","); if (substr($data_LiabilitiesShort2['balance'], 0, 1) == "-"){ $data_LiabilitiesShort2['balance'] = str_replace("-", "(", $data_LiabilitiesShort2['balance']); $data_LiabilitiesShort2['balance'] = $data_LiabilitiesShort2['balance'] . ")"; echo $data_LiabilitiesShort2['balance']; } else {echo $data_LiabilitiesShort2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Total Current Liabilites</td>
								<td style="border-top: solid 1px; text-align: right">&nbsp;</td>
								<td style="text-align: right;"><?php echo number_format($total_ShortLiabilities, 2, ".", ","); ?></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Non-Current Liabilities</td>
								<td></td>
								<td></td>
							</tr>
								<?php 
								$LastEntry = true;
								$total_FixedLiabilities = 0;								
								
								if ($results_LiabilitiesFixed->num_rows > 0) {
									
									while($data_LiabilitiesFixed = $results_LiabilitiesFixed->fetch_assoc()) { 																
									
									$currentAccount = $data_LiabilitiesFixed['accountName'];
									$currentSystemId = $data_LiabilitiesFixed['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$results_LiabilitiesFixed2 = $conn->query($ridiculousSQL);
									
									while($data_LiabilitiesFixed2 = $results_LiabilitiesFixed2->fetch_assoc()) { 
										$currentNormalSide = $data_LiabilitiesFixed2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 70px;"><?php echo $data_LiabilitiesFixed2["accountName"]; ?></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $total_FixedLiabilities = $total_FixedLiabilities + (float)$data_LiabilitiesFixed2['balance']; $data_LiabilitiesFixed2['balance'] = number_format((float)$data_LiabilitiesFixed2['balance'], 2, ".", ","); if (substr($data_LiabilitiesFixed2['balance'], 0, 1) == "-"){ $data_LiabilitiesFixed2['balance'] = str_replace("-", "(", $data_LiabilitiesFixed2['balance']); $data_LiabilitiesFixed2['balance'] = $data_LiabilitiesFixed2['balance'] . ")"; echo "$ &nbsp;" . $data_LiabilitiesFixed2['balance']; } else {echo "$ &nbsp;" . $data_LiabilitiesFixed2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Total Non-Current Liabilites</td>
								<td style="border-top: solid 1px; text-align: right">&nbsp;</td>
								<td style="text-align: right;"><?php echo number_format($total_FixedLiabilities, 2, ".", ","); ?></td>
							</tr>
							<tr>
								<td>Total Liabilities</td>
								<td style="padding-top: solid 1px;">&nbsp;</td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: solid 1px"><?php $total_Liabilites = $total_FixedLiabilities + $total_ShortLiabilities; echo number_format($total_Liabilites, 2, ".", ","); ?></td>
							</tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr>
								<td>Stockholders' Equity</td>
								<td></td>
								<td></td>
							</tr>
							<?php 
								$firstEntry = true;
								$total_Equity = 0;								
								
								if ($results_Equity->num_rows > 0) {
									
									while($data_Equity = $results_Equity->fetch_assoc()) { 																
									
									$currentAccount = $data_Equity['accountName'];
									$currentSystemId = $data_Equity['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND (Journals.type='REG' OR Journals.type='ADJ') GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$results_Equity2 = $conn->query($ridiculousSQL);
									
									while($data_Equity2 = $results_Equity2->fetch_assoc()) { 
										$currentNormalSide = $data_Equity2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 35px;"><?php echo $data_Equity2["accountName"]; ?></td>
								<td></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $total_Equity = $total_Equity + (float)$data_Equity2['balance']; $data_Equity2['balance'] = number_format((float)$data_Equity2['balance'], 2, ".", ","); if (substr($data_Equity2['balance'], 0, 1) == "-"){ $data_Equity2['balance'] = str_replace("-", "(", $data_Equity2['balance']); $data_Equity2['balance'] = $data_Equity2['balance'] . ")"; echo $data_Equity2['balance']; } else {echo $data_Equity2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Retained Earnings</td>
								<td></td>
								<td style="text-align: right;"><?php echo number_format($retainedEarnings, 2, ".", ","); ?></td>
							</tr>
							<tr>
								<td>Total Stockholders' Equity</td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: solid 1px;"><?php $total_StakeholderEquity = $total_Equity + $retainedEarnings; echo number_format($total_StakeholderEquity, 2, ".", ","); ?></td>
							</tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr>
								<td><b>Total Liabilities & Stockholders' Equity</b></td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: double 3px;"><?php $total_LiabilitesEquities = $total_Liabilites + $total_StakeholderEquity;  echo "$ &nbsp;" . number_format($total_LiabilitesEquities, 2, ".", ",");?></td>
							</tr>							
						</tbody>
					</table>
					</br></br></br>
			</div>
			
		<!--</form> -->
		</div>		
		<script type="text/javascript">
			$('#datetimepicker6').datetimepicker({
			defaultDate: new Date(),
			format: 'MM/DD/YYYY', 
			useCurrent: false,
			//maxDate: new Date(), 
			disabledDate: [
				new Date()
			]
			//disabledDate: [
			//	moment(new Date),
			//	new Date(2018, 11 - 1, 21),
			//	"11/22/2018 00:53"
			//]
			//startDate: '-7d',
			//endDate: '+0d'
		});
		</script>
	</body>
</html>
