<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_EditChartOfAccounts.php") ?>
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
				<div class="row d-none error-wrap">
					<div class="col col-xs-2  col-lg-1"></div>
					<div class="col col-xs-8  col-lg-10">
						<div class="alert alert-danger" role="alert"></div>
					</div>
				</div>

				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form action="includes/dcf_Write_EditChartOfAccounts.php" class="editCharOfAccountForm" method="post">
							<table style="border-spacing: 40px 20px">
								<col width="300px">
								<col width="450px">
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 0px;">Account Name</td>
									<td style="text-align: left; font-size: 22; color: #A9A9A9; padding-left: 50px; padding-bottom:0px; padding-top: 0px;"><?php echo $data["accountName"] ?></td>
									
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787;">Balance</td>
									<td style="text-align: left; font-size: 22; color: #A9A9A9; padding-left: 50px; padding-bottom:0px; padding-top: 0px;">$<?php echo number_format(doubleval($data["balance"]), 2, '.', ','); ?><input class="balance-hidden" type="hidden" name="balance-hidden" value="<?php echo($data["balance"]); ?>"></td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-top: 10px;">Active</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 20px;">
										<input type="checkbox" name="active" id="active" value="Active" <?php if ($data['active'] == "Active") {echo "checked";} ?>>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-top: 17px; vertical-align: text-top;">Comments</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 20px">
										<textarea id="comments" name="comments" class="form-control" rows="4"><?php echo $data["comments"];?></textarea>
									</td>
								</tr>
<!--
								<tr>
									<td></td>?php echo "systemId: " . $data["comments"]; ?></td>
									<td></td>?php echo "value from button on other page: " . $_POST['editButtonSelected']; ?></td>
								</tr>
-->
							</table>
							
							
				</div>
			</div>
			<div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 75px">
				<a href="http://www.mindthegaap.info/ChartOfAccounts.php"><button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</button></a> &nbsp;
				<button type="submit" class="btn btn-success update-button" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">UPDATE</button>
			</div>
		</div>
		<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value=<?php echo $_POST['editButtonSelected']; ?>/>
	</form>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.update-button').click(function(e){
					e.preventDefault();
					var balance = $('.balance-hidden').val();
					var activeSelected =  $('#active:checked').length;
					if(!activeSelected){
						if(balance==0){
							$('.editCharOfAccountForm').submit();
						}else{
							$('.error-wrap').removeClass('d-none');
							$('.error-wrap .alert').html('You can not deactivate an account with balance higher than zero');
						}
					}else{
						$('.editCharOfAccountForm').submit();
					}
				})
			});
		</script>
	</body>
</html>
