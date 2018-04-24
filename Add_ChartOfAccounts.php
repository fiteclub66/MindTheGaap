<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
?>
<?php include($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_AddChartOfAccounts.php"); ?>

<html lang="en">
	<head>
		<title>Add Chart of Accounts</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">Add Chart of Accounts</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form action="includes/dcf_Write_AddChartOfAccounts.php" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<table style="border-spacing: 40px 20px">
								<col width="300px">
								<col width="450px">
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px">Account Name</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px">
										<div class="form-group">
											<select class="form-control" id="account_Name" name="accountName">
											    <option value="" disabled="true" selected style="color: #D3D3D3">Account Name</option>
											    <?php while($data = $result->fetch_assoc()) { ?>
								
											    <?php echo "<option value=".$data["systemId"].">" . $data["accountId"] . " - " . $data["accountName"] . "</option>"; ?>
												<?php } ?>
											</select>
										</div>
									</td>
								</tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px">Initial Balance</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px;">
										<input id="addCOABalance" type="text" name="addCOABalance" class="form-control" rows="4" placeholder="Balance" onchange="validateFloatKeyPress(this);"></input>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787">Active</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px">
										<input type="checkbox" name="addCOAActive" value="Active">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-top: 17px; vertical-align: text-top;">Comments</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 20px">
										<textarea id="add_COAComments" name="addCOAComments" class="form-control" rows="4" placeholder="Comments"></textarea>
									</td>
								</tr>
							</table>
							
				</div>
			</div>
			<div class="row col-xs-5 col-sm-6 col-md-5 col-lg-3 float-right" style="margin-top: 75px">
				<a href="http://www.mindthegaap.info/ChartOfAccounts.php"><button type="submit" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</button></a> &nbsp;
				<button type="submit" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">ADD</button>
			</div>
			</form>
		</div>

			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
                $("#addCOABalance").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                         // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                         // Allow: home, end, left, right, down, up
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
			});
		    function validateFloatKeyPress(el) {
		        var v = parseFloat(el.value);
		        el.value = (isNaN(v)) ? '' : v.toFixed(2);
		    }
		</script>
	</body>
</html>
