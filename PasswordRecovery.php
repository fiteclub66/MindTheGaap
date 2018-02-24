<html lang="en">
	<head>
		<title>Password Recovery</title>
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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 align="center">Password Recovery</h1>
			</div>
			<form id="recoveryForm" action="">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
				        $("#AppendDiv").append("<div>Appended item</div>");
			    });
			});
		</script>
	</body>
</html>