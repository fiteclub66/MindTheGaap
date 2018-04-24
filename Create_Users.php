<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
?>
<html lang="en">
	<head>
		<title>CREATE USER</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">CREATE USERS</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form action="includes/dcf_Write_CreateUser.php" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
					<!-- <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div> -->
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">						
							<table style="border-spacing: 40px 20px">
								<col width="300px">
								<col width="450px">
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px;">First Name</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="first_Name" name="firstName" placeholder="First Name">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Last Name</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
										<input type="text" class="form-control" id="last_Name" name="lastName" placeholder="Last Name">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">Position</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<div class="form-group">
											<select class="form-control" id="sel_Position" name="position">
											    <option value="" disabled="true" selected style="color: #D3D3D3">Position</option>
											    <option value="Administrator">Administrator</option>
											    <option value="Manager">Manager</option>
											    <option value="User">User</option>											    
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 0px">Username</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
										<input type="text" class="form-control" id="user_Name" placeholder="Username"  name="username">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 0px">Password</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px; padding-top: 10px">
										<input type="password" class="form-control" id="password" placeholder="Password"  name="password">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787">Active</td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px">
										<input type="checkbox" name="active" value="Active">
									</td>
								</tr>								
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">
										Security Question 1: 
									</td>
									<td style="font-size: 16; color: #000000; padding-left: 50px; padding-top: 10px">What was the name of your favorite pet?</td>
								</tr>
								<tr>
									<td></td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="security_Answer1" name="securityAnswer1" placeholder="Security Answer 1">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">
										Security Question 2: 
									</td>
									<td style="font-size: 16; color: #000000; padding-left: 50px; padding-top: 10px">In what city were you born?</td>
								</tr>
								<tr>
									<td></td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="security_Answer2" name="securityAnswer2" placeholder="Security Answer 2">
									</td>
								</tr>
								<tr>
									<td style="text-align: right; font-size: 28; color: #DD9787; padding-bottom: 10px; padding-top: 10px">
										Security Question 3: 
									</td>
									<td style="font-size: 16; color: #000000; padding-left: 50px; padding-top: 10px">What is your mother's maiden name?</td>
								</tr>
								<tr>
									<td></td>
									<td style="font-size: 28; color: #DD9787; padding-left: 50px; padding-top: 10px">
										<input type="text" class="form-control" id="security_Answer3" name="securityAnswer3" placeholder="Security Answer 3">
									</td>
								</tr>
							</table>						
				</div>
			</div>
			<div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 50px">
				<a href="Users_Admin.php" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">CANCEL</a> &nbsp;
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
