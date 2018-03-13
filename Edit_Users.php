<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_EditUsers.php"); ?>
<html lang="en">
	<head>
		<title>Edit USER</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php"); ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">EDIT USERS</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form action="includes/dcf_Write_EditUsers.php" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">						
						<table style="border-spacing: 40px 20px">
							<col width="300px">
							<col width="450px">
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px;">User ID</td>
								<td style="text-align: left; font-size: 22; color: #A9A9A9; padding-left: 50px; padding-bottom:10px; padding-top: 0px;"><?php echo $data["userId"]; ?></td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px;">First Name</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
									<input type="text" class="form-control" id="first_Name" name="firstName" value = "<?php echo $data["firstName"] ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Last Name</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
									<input type="text" class="form-control" id="last_Name" name="lastName" value = "<?php echo $data["lastName"] ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Position</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
									<div class="form-group">
										<select class="form-control" id="sel_Position" name="position">										    
										    <option value="Administrator" <?php if($data["position"] == "Administrator"){echo "selected";}?>>Administrator</option>
										    <option value="Manager" <?php if($data["position"] == "Manager"){echo "selected";}?>>Manager</option>
										    <option value="User" <?php if($data["position"] == "User"){echo "selected";}?>>User</option>											    
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 0px">Username</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
									<input type="text" class="form-control" id="user_Name" name="username"  value = <?php echo $data["username"] ?>>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 0px">Password</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
									<input type="password" class="form-control" id="password" placeholder="Password"  name="password"  value = "<?php echo $data["password"] ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align: right; font-size: 28; color: #DD9787">Active</td>
								<td style="font-size: 28; color: #DD9787; padding-left: 50px">
									<input type="checkbox" id="active" name="active" value="Active" <?php if ($data['active'] == "Active") {echo "checked";} ?>>
								</td>
							</tr>	
<!--
							<tr>
								<td></td>?php echo "systemId: " . $data["systemId"]; ?></td>
								<td></td>?php echo "value from button on other page: " . $_POST['editButtonSelected']; ?></td>
							</tr>							
-->
						</table>						
					</div>
				</div>
				<div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 50px">
					<a href="Users_Admin.php" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</a> &nbsp;
					<button type="submit" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">UPDATE</button> 
				</div>
				<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value=<?php echo $_POST['editButtonSelected']; ?>/>
			</form>	
			<!-- <//?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_CreateAccount.php") ?> -->

		</div>

			</div>
		</div>

		<script type="text/javascript">
			
		</script>
	</body>
</html>
