<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<html lang="en">
	<head>
		<title>Edit Account - Chart of Accounts</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>	
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">Edit Chart of Accounts</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>

				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form id="editCOAForm" name="editCOAForm">
							<table style="border-spacing: 40px 20px">
								<col width="300px">
								<col width="450px">
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px">Account Name</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px">
										<div class="form-group">
											<select class="form-control" id="sel1">
											    <option value="" disabled="true" selected style="color: #D3D3D3">Account Name</option>
											    <option value="105">105 - Cash</option>
											    <option value="106">106 - Petty Cash</option>
											    <option value="201">201 - Accounts Receivable</option>
											    <option value="208">208 - Accounts Payable</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787">Active</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px">
										<input type="checkbox" name="editCOAActive">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-top: 17px; vertical-align: text-top;">Comments</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 20px">
										<textarea id="editCOAComments" name="comments" class="form-control" rows="4" placeholder="Comments"></textarea>
									</td>
								</tr>
							</table>
						</form>	
				</div>
			</div>
			<div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 75px">
				<a href="http://www.mindthegaap.info/ChartOfAccounts.php"><button type="" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</button></a> &nbsp;
				<a href="http://www.mindthegaap.info/ChartOfAccounts.php"><button type="" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">UPDATE</button></a>
			</div>
		</div>

			</div>
		</div>

		<script type="text/javascript">
			
		</script>
	</body>
</html>
