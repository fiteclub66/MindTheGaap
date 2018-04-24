<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
?>
<html lang="en">
	<head>
		<title>MtG Home Page</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->
	  	<link rel="stylesheet" href="CSS.css">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</head>
	<body style="background-color:#FFFFFF">
		<div class="container">
			<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 align="center">Mind the Gaap Home Page</h1>
			</div>
			<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="ChartOfAccounts.php" class="btn btn-info" role="button">Chart of Accounts</a>
			</div>

			<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<img src="images/memeCollage1.png" height="500px" width="800px">
				</div>
			</div>
		</div>
	</body>
</html>
