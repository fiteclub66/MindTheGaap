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
			<h6>For the Period Ending on <?php $dummyDate = $_SESSION['financialDate']; echo date("m/d/Y", strtotime($dummyDate));?></h5>
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
								$revenueTotal = 0;
								
								while($revenueData = $revenueResults->fetch_assoc()) { 
								
								if ($revenueResults->num_rows > 0) {
									
									$currentAccount = $revenueData['accountName'];
									$currentSystemId = $revenueData['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									$ridiculousSQL = "SELECT DISTINCT Journals.accountName, IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Debit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='REG' GROUP BY Journals.accountName), 0) - IFNULL((SELECT SUM(Journals.amount) FROM Journals WHERE Journals.creditDebit = 'Credit' AND Journals.accountSystemId = '$currentSystemId' AND Journals.status = 'Approved' AND Journals.date <= '$selectedDate' AND Journals.type='REG' GROUP BY Journals.accountName), 0) AS 'balance', Accounts.normalSide FROM Journals, Accounts WHERE Journals.accountSystemId = '$currentSystemId' AND Journals.accountSystemId = Accounts.systemId";
									
									$revenueResult2 = $conn->query($ridiculousSQL);
									
									while($revenueData2 = $revenueResult2->fetch_assoc()) { 
										$currentNormalSide = $revenueData2['normalSide'];
										?>
							<tr height="35px" >
								<td style="padding-left: 70px;"><?php echo $revenueData2["accountName"]; ?></td>
								<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
								<td style="text-align: right"><?php $revenueTotal = $revenueTotal + (float)$revenueData2['balance']; if($firstEntry == true){echo "$"; $firstEntry = false;} $revenueData2['balance'] = number_format((float)$revenueData2['balance'], 0, ".", ","); if (substr($revenueData2['balance'], 0, 1) == "-"){ $revenueData2['balance'] = str_replace("-", "(", $revenueData2['balance']); $revenueData2['balance'] = $revenueData2['balance'] . ")"; echo $revenueData2['balance']; } else {echo $revenueData2['balance'];} ?></<td>										
							</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td style="padding-left: 35px;">Total Current Assets</td>
								<td style="border-top: solid 1px; text-align: right;"></td>
								<td style="text-align: right;"><?php echo '$ total current assets'; ?></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Long-Term Assets</td>
								<td></td>
								<td></td>
							</tr>
						<?php //Loop here for long-term asset print outs ?>
							<tr>
								<td style="padding-left: 70px;">pull long-term assets pull</td>
							</tr>
						<?php //end long-term ass loop here ?>
							<tr>
								<td style="padding-left: 35px;">Total Long-Term Assets</td>
								<td style="border-top: solid 1px;"></td>
								<td style="text-align: right;"><?php echo 'total long-term assets'; ?></td>		
							</tr>
							<tr><td><b>Total Assets</b></td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: double 3px;"><?php echo 'totalAssets'; ?></td>
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
							<tr height="25px">
								<td style="padding-left: 70px;">pull liabilities</td>
								<td style="text-align: right;">
								<!--<td style="text-align: right;">
									<span style="border-bottom: 1px solid #000; border-top: 1px solid #000;"> -->
									<span>
										<?php 
											$revenueTotalPrint = number_format($revenueTotal, 0, ".", ",");
											if (substr($revenueTotalPrint, 0, 1) == "-"){ 
												$revenueTotalPrint = str_replace("-", "(", $revenueTotalPrint); 
												$revenueTotalPrint = $revenueTotalPrint . ")";											
											}
											//echo $revenueTotalPrint; 
											//echo "pull current liabilities";
										?>
									</span>
								</td>	
							</tr>
							<tr>
								<td style="padding-left: 35px;">Total Current Liabilites</td>
								<td style="border-top: solid 1px; text-align: right">&nbsp;</td>
								<td style="text-align: right;"><?php echo 'total current liabilities'; ?></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Unearned Revenue</td>
								<td></td>
								<td style="text-align: right;"><?php echo '$unearned revenue'; ?></td>
							</tr>
							<tr>
								<td>Total Liabilities</td>
								<td style="padding-top: solid 1px;">&nbsp;</td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: solid 1px"><?php echo "$ Total Liablities"; ?></td>
							</tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr>
								<td>Stockholders' Equity</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Contributed Capital</td>
								<td></td>
								<td style="text-align: right;"> <?php echo "$ ContributedCapital"; ?></td>
							</tr>
							<tr>
								<td style="padding-left: 35px;">Retained Earnings</td>
								<td></td>
								<td style="text-align: right;"><?php echo "$ RetainedEarnings"; ?></td>
							</tr>
							<tr>
								<td>Total Stockholders' Equity</td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: solid 1px;"><?php echo "$ Total St. Equity"; ?></td>
							</tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr>
								<td><b>Total Liabilities & Stockholders' Equity</b></td>
								<td></td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: double 3px;"><?php echo "$ Total L + E"; ?></td>
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
			maxDate: new Date(), 
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
