<?php

	session_start();
	$_SESSION['loggedOut'] = "initial";
	
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Login.php");
	//print_r($_SESSION);
	if (isset($_POST) & !empty($_POST)) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		//echo "<br/>";
		$password = $_POST['password'];
	
		$sql = "SELECT * FROM mindthegaap.Users WHERE username = '$username' AND password = '$password'";
	
		$result = mysqli_query($connection, $sql);
		$count = mysqli_num_rows($result);
		if($count == 1){
			//echo "create session";
			$data = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $data['username'];
			$_SESSION['firstName'] = $data['firstName'];
			$_SESSION['userId'] = $data['userId'];
			$_SESSION['systemId'] = $data['systemId'];
			$_SESSION['position'] = $data['position'];
			$_SESSION['financialDate'] = date('Y-m-d');
		} else {
			$fmsg = "Invalid Username/Password";
		}
	}
	if (isset($_SESSION['username'])) {
		$smsg = "User already logged in";
		if($_SESSION['position'] == "User") {
			header('Location: ChartOfAccounts_Users.php');
		} else {
			header('Location: ChartOfAccounts.php');
		}
	}

?>
<html lang="en">
	<head>
		<title>Login</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<?php if($_SESSION['loggedOut'] == true) {echo '<script type="text/javascript">alert("You have been successfully logged out");</script>'; $_SESSION['loggedOut'] = false;} else { $_SESSION['loggedOut'] = false;} ?>

	<body style="background-color:#FFFFFF">

			<nav class="navbar navbar-toggleable-md navbar-light navbar-inverse" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px">
  				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
 				</button>
  				<div class="navbar-header">
    				<a class="navbar-brand" href="#"><img src="images/logo_with_text.png" height="30px" width="100px" style="margin-top: -5px"></a>
    			</div>
  				<div class="collapse navbar-collapse" id="navbarNav">
    	
  				</div>
			</nav>	
		<div class="container">
			<br/>
<!--
				</?php if($_SESSION['loggedOut'] = true) {echo '<div class="alert alert-success" role="alert">You have successfully logged out</div>'; $_SESSION['loggedOut'] = false;}else{echo "";} ?>
-->
				<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div>
				<?php } elseif (isset($_SEESION['message'])){?><div class="alert alert-danger" role="alert"><?php echo $_SESSION['message'];?></div><?php } ?>
			<div class="row" style="margin-top: 20px">
				<div class="col-xs-2 col-sm-3 col-md-2 col-lg-5"></div>
				<div class="row col-xs-10 col-sm-9 col-md-7 col-lg-7" style="margin-left: -2%">
					<img src="images/mainLogo.png" height="250px" width="170px"> 
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form id="loginForm" action="" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
					<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
					<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">						
						<input type="text" id="username" name="username" size="60" placeholder="Username">
					</div>
					<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
					<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
					<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">	
						<input type="password" id="password" name="password" size="60" placeholder="Password">
					</div>	
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px; width: 100%;">
					<table style="margin: 0 auto;">
						<tr>
							<td>
								<button type="submit" class="btn btn-success btn-large" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">LOGIN</button>	
							</td>
						</tr>
					</table>					
				</div>	
			</form>
<!--
			<div>< ?php if(isset($message)) { echo "message: ". $message; } ?></div>
-->
		<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px; width: 100%;">
					<table style="margin: 0 auto;">
						<tr>
							<td>
								<a href="PasswordRecovery.php">Forgot Password</a>	
							</td>
						</tr>
					</table>	
					<br/><br/><br/>				
				</div>
		</div>
	</body>
</html>
