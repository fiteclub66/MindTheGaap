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
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_RetainedEarnings.php"); ?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/NetIncomeCalculation.php"); ?>

<html lang="en">
	<head>
		<title>Retained Earnings</title>
	
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
				<h4>Retained Earning</h4>
				<!--<h6>For the Period Ending on </?php echo date("m/d/Y"); ?></h6> -->
<!--
				<h6>For the Period Ending on <span id="dateInsert" name="dateInsert" onload="test()"></span></h5>
-->
			<h6>For the Period Ending on <?php $dummyDate = $_SESSION['financialDate']; echo date("m/d/Y", strtotime($dummyDate));?></h5>
			</div>
			<form action="IncomeStatement.php" method="post">
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
				<table id="example" name="example" class="display" cellspacing="10" width="40%" style="margin-left: auto; margin-right: auto;"> <!--color: #DD9787 -->
						<thead>
							<tr>
								<th style="color: white;">&nbsp;</th>
								<th style="text-align: center;">&nbsp;</th>
							</tr>
						</thead>						
						<tbody style="margin-bottom: 10px;">
							<tr height="30px">
								<td>Beginning Retained Earnings, 1/1/2018</td>
								<td style="text-align: right;">$ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									<?php 
											$beginningREPrint = number_format($beginningRE, 0, ".", ",");
											if (substr($beginningREPrint, 0, 1) == "-"){ 
												$beginningREPrint = str_replace("-", "(", $beginningREPrint); 
												$beginningREPrint = $beginningREPrint . ")";											
											}
											echo $beginningREPrint;
									?>
								</td>
							</tr>
							<tr height="30px">
								<td>Add: Net Income</td>
								<td style="text-align: right;">
									<?php 
										$netIncomePrint = number_format($netIncome, 0, ".", ",");
										if (substr($netIncomePrint, 0, 1) == "-"){ 
											$netIncomePrint = str_replace("-", "(", $netIncomePrint); 
											$netIncomePrint = $netIncomePrint . ")";											
										}
										echo $netIncomePrint;
									?>
								</td>
							</tr>
							<tr height="30px">
								<td>Less: Dividends</td>
								<td style="text-align: right;">
									<?php 
										$dividendsPrint = number_format($dividends, 0, ".", ",");
										if (substr($dividentsPrint, 0, 1) == "-"){ 
											$dividendsPrint = str_replace("-", "(", $dividendsPrint); 
											$dividendsPrint = $dividendsPrint . ")";											
										}
										echo $dividendsPrint;
									?> 
								</td>
							</tr>
							<tr height="30px">
								<td>End Retained Earnings, <?php echo date("m/d/Y", strtotime($dummyDate)); ?> </td>
								<td style="text-align: right; border-top: solid 1px; border-bottom: double 3px;">
									<?php 
										$endRE = $beginningRE + $netIncome - $dividends; 
										$endREPrint = number_format($endRE, 0, ".", ",");
										if (substr($endREPrint, 0, 1) == "-"){ 
											$endREPrint = str_replace("-", "(", $endREPrint); 
											$endREPrint = $endREPrint . ")";											
										}
										echo "$ " .$endREPrint;
									?>
								</td>
							</tr>	
						</tbody>
						
					</table>
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
