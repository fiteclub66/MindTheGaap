<?php

	include("includes/header.php");

	//Login Process
	if (count($_POST)>0) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password=sha1($password);
		$sql="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
		$res=mysql_query($sql);
		$count= mysql_num_rows($res);
		if ($count==1) {//valid login
			$user=mysql_fetch_object($res);
			$_SESSION['logged']=true;
			$_SESSION['user_id']=$user->id;
			$_SESSION['user_type']=$user->type;
			header("location: dash.php");
			exit();
		}else{
			$error="Error! There was an error in login.";
		}
	}

?>
  <div class="wrapper login">
	<div class="container">
		<h1>Welcome</h1>
		<form class="login-form" method="post">
			<?php
				if (!empty($error)) {
			?>
			<div class="alert alert-danger" role="alert"><?= $error ?></div>
			<?php
				}
			?>
			<input type="text" placeholder="Username" name="username" id="username">
			<input type="password" placeholder="Password" name="password" id="password">
			<input type="submit" id="login-button" name="submit" value="Login">
			<a href="#">Forgot Password</a>
		</form>
	</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

