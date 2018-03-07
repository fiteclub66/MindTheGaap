<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_UsersGeneral.php"); ?> 

<html lang="en">
	<head>
		<title>User List</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

		<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>	
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">USER INFORMATION</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-2">
				</div>
				<div class="row col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<table style="border-spacing: 40px 20px">
						<tr>
							<td style="text-align: right; font-size: 32; color: #DD9787;"><b>User ID</b></td>
							<td style="font-size: 28; color: #DD9787; padding-left: 50px"><?php echo $data["userId"] ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-size: 32; color: #DD9787"><b>First Name</b></td>
							<td style="font-size: 28; color: #DD9787; padding-left: 50px"><?php echo $data["firstName"] ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-size: 32; color: #DD9787"><b>Last Name</b></td>
							<td style="font-size: 28; color: #DD9787; padding-left: 50px"><?php echo $data["lastName"] ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-size: 32; color: #DD9787"><b>Position</b></td>
							<td style="font-size: 28; color: #DD9787; padding-left: 50px"><?php echo $data["position"] ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-size: 32; color: #DD9787"><b>Status</b></td>
							<td style="font-size: 28; color: #DD9787; padding-left: 50px"><?php echo $data["active"] ?></td>
						</tr>
					</table>	
				</div>
			</div>
			<!-- <div class="row col-xs-5 col-sm-4 col-md-4 col-lg-3 float-right" style="margin-top: 100px">
				<button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 100px">EDIT</button>
			</div> -->
		</div>

		<script type="text/javascript">

		</script>
	</body>
</html>
