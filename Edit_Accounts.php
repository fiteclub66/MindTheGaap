<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_EditAccounts.php") ?>
<html lang="en">
	<head>
		<title>EDIT ACCOUNT</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">EDIT ACCOUNT</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form action="includes/dcf_Write_EditAccounts.php" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">						
							<table style="border-spacing: 40px 20px">
								<col width="300px">
								<col width="450px">
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px;">Account Name</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="accountName" name="accountName" placeholder="Account Name" value = "<?php echo $data["accountName"] ?>">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Account ID</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
										<input type="text" class="form-control" id="accountID" name="accountId" placeholder="Account ID" value = <?php echo $data["accountId"] ?>>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Category</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<div class="form-group">
											<select class="form-control" id="sel_Category" name="category">
											    <option value="Asset" <?php if($data["category"] == "Asset"){echo "selected";}?> >Asset</option>
											    <option value="Liability" <?php if($data["category"] == "Liability"){echo "selected";}?>>Liability</option>
											    <option value="Equity" <?php if($data["category"] == "Equity"){echo "selected";}?>>Equity</option>
											    <option value="Revenue" <?php if($data["category"] == "Revenue"){echo "selected";}?>>Revenue</option>
											    </select>
										</div>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px;">Subcategory</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<div class="form-group">
											<select class="form-control" id="sel_Subcategory" name="subcategory">											    
											    <option value="Long-Term" <?php if($data["subcategory"] == "Long-Term"){echo "selected";}?>>Long-Term</option>
											    <option value="Short-Term" <?php if($data["subcategory"] == "Short-Term"){echo "selected";}?>>Short-Term</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 0px">Account Order</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
										<input type="text" class="form-control" id="accountOrder" placeholder="Account Order"  name="accountOrder" value = <?php echo $data["accountOrder"] ?>>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Normal Side</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<div class="form-group">
											<select class="form-control" id="sel_NormalSide"  name="normalSide" style="margin-top: 10px">
											    <option value="Right" <?php if($data["normalSide"] == "Right"){echo "selected";}?>>Right</option>
											    <option value="Left" <?php if($data["normalSide"] == "Left"){echo "selected";}?>>Left</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Comments</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="comments" name="comments" placeholder="Comments" value= "<?php echo $data["comments"] ?>">
									</td>
								</tr>
<!--
								<tr>
									<td></td>?php echo "systemId: " . $data["systemId"]; ?></td>
									<td></td>?php echo "value from button on other page: " . $_POST['editButtonSelected']; ?></td>
								</tr>
-->
							</table>	
							<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value=<?php echo $_POST['editButtonSelected']; ?>/>					
				</div>
			</div>
			<div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 50px">
				<a href="Accounts.php" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</a> &nbsp;
				<button type="submit" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">SAVE</button> 
			</div>
			</form>	
			<!-- <//?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_CreateAccount.php") ?> -->

		</div>

			</div>
		</div>

		<script type="text/javascript">
			
		</script>
	</body>
</html>
