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
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_AdjustedTrialBalance.php"); ?>

<html lang="en">
	<head>
		<title>Adjusted Trial Balance</title>
	
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
				<h4>Adjusted Trial Balance</h4>
				<!--<h6>For the Period Ending on </?php echo date("m/d/Y"); ?></h6> -->
<!--
				<h6>For the Period Ending on <span id="dateInsert" name="dateInsert" onload="test()"></span></h5>
-->
			<h6>For the Period Ending on <?php $dummyDate = $_SESSION['financialDate']; echo date("m/d/Y", strtotime($dummyDate));?></h5>
			</div>
			<form action="AdjustedTrialBalance.php" method="post">
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
				<br><br>
				<!--</?php print_r($result); ?> -->
				<table id="example" name="example" class="display" cellspacing="10" width="60%" style="margin-left: auto; margin-right: auto;"> <!--color: #DD9787 -->
						<thead>
							<tr>
								<th style="color: white;">&nbsp;</th>
							</tr>
						</thead>
						<!-- uncomment if search bar per column is wanted -->
						<!--<tfoot>
							<tr>
								<th>Name</th>
								<th>CATEGORY</th>
								<th style="color: white">&nbsp;</th>
							</tr>
						</tfoot> -->
						<tbody style="margin-bottom: 10px;">
							<?php 
								$firstDebit = true;
								$firstCredit = true;
								$debitTotal = 0;
								$creditTotal = 0;
								
								while($data = $result->fetch_assoc()) { 
								
								if ($result->num_rows > 0) {
									
									$currentAccount = $data['accountName'];
									$currentSystemId = $data['accountSystemId'];
									$selectedDate = $_SESSION['financialDate'];
									
									$result2 = $conn->query($ridiculousSQL);
									
									while($data2 = $result2->fetch_assoc()) { 
										$currentNormalSide = $data2['normalSide'];
										?>
										<tr style="border-bottom: solid 1px;" height="35px" >
											<td><?php echo $data2["accountName"]; ?></td>
											<!-- if($data2['balance'] > 0) //for if he doesn't want $0 balances showing{ -->
											<td style="text-align: center"><?php if($currentNormalSide == "Left"){$debitTotal = $debitTotal + (float)$data2['balance']; if($firstDebit == true){echo "$"; $firstDebit = false;} $data2['balance'] = number_format((float)$data2['balance'], 0, ".", ","); if (substr($data2['balance'], 0, 1) == "-"){ $data2['balance'] = str_replace("-", "(", $data2['balance']); $data2['balance'] = $data2['balance'] . ")"; echo $data2['balance']; } else {echo $data2['balance'];}} ?></<td>
											<td style="text-align: center"><?php if($currentNormalSide == "Right"){$data2['balance'] = ((float)$data2['balance'] * -1);$creditTotal = $creditTotal + (float)$data2['balance']; if($firstCredit == true){echo "$"; $firstCredit = false;} $data2['balance'] = number_format((float)$data2['balance'], 0, ".", ","); if (substr($data2['balance'], 0, 1) == "-"){ $data2['balance'] = str_replace("-", "(", $data2['balance']); $data2['balance'] = $data2['balance'] . ")"; echo $data2['balance']; } else {echo $data2['balance'];}} ?></td>
										</tr>		
									<?php } ?>
							<?php } ?>
						<?php } ?>
							<tr>
								<td></td>
								<!--border-bottom: double 3px -->
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
