<html lang="en">
	<head>
		<title>PASSWORD RECOVERY</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>
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
			<div class="row" style="margin-top: 40px">
				<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-9">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">PASSWORD RECOVERY</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<form id="recoveryForm" action="">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
					<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
					<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
						<b>What is your username?</b><br>
						<input type="text" id="username" name="username" size="80">
						<br><br>
						<b>Question 1: What is the meaning of life?</b><br>
						<input type="text" id="answer1" name="answer1" size="80">
						<br><br>
						<b>Question 2: What is the average flying speed of a swallow?</b><br>
						<input type="text" id="answer2" name="answer2" size="80"><br><br>
						<b>Question 3:  What is is the name of the disease the kids have in school of rock when pretending to be sick?</b><br>
						<input type="text" id="answer3" name="answer3" size="80">
						<br><br>
						<table class="table" cellspacing="5" style="border: none">
							<tr>
								<td><button type="button" name="BtnSubmit" class="btn btn-success">Submit</td>
								<td><button type="reset" name="BtnClear" class="btn btn-primary">Clear All</td>
								<td><button type="reset" name="cancel" class="btn btn-warning">Cancel</td>
							</tr>
						</table>
					</div>
					<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
				</div>
			</form>
			
		</div>
		<div id="AppendDiv" name="AppendDiv"></div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#btnClear').click(function(){				
						$('#recoveryForm').val('');				
				});
			});
			$(document).ready(function(){
				$("#BtnSubmit").click(function(){
				        $("#AppendDiv").append("<div>Your password is: </div>");
			    });
			});
		</script>
	</body>
</html>
