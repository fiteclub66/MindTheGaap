<html lang="en">
	<head>
		<title>Password Recovery</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->
	  	<link rel="stylesheet" href="CSS.css">

	  	<!-- Lato Font -->
	  	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

	  	<!-- jquery javascript-->
	  	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	  	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
	  	<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->

	  	<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
		 
		<!-- DataTables javascript-->
		<!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>


	  	<!-- Bootstrap CSS -->
	  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


	  	<!-- ajax javascript-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>


		<!-- Bootstrap Javascript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		
		


		<style>
			#funky_font {font-family: 'Lato';}
		</style>
	</head>
	<body style="background-color:#FFFFFF">

			<nav class="navbar navbar-toggleable-md navbar-light navbar-inverse" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px">
  				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
 				</button>
  				<div class="navbar-header">
    				<a class="navbar-brand" href="#"><img src="images/logo_with_text.png" height="30px" width="100px" style="margin-top: -5px"></a>
    			</div>
  				<div class="collapse navbar-collapse" id="navbarNav">
    				<!-- <ul class="navbar-nav">
      					<li class="funky_font" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;">
			    		   | &nbsp;  <a href="http://www.mindthegaap.info/ChartOfAccounts.php" style="color: white">CHARTS OF ACCOUNTS</a>
				    	</li>
				    	<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				    		| &nbsp;  <a href="http://www.mindthegaap.info/Accounts.php" style="color: white">ACCOUNTS</a> 
				    	</li>
				    	<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				    		| &nbsp;  <a href="http://www.mindthegaap.info/EventsLog.php" style="color: white">LOGS</a>
				    	</li>
				    	<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				    		| &nbsp;  <a href="http://www.mindthegaap.info/Categories.php" style="color: white">CATEGORIES</a> 
				    	</li>
				    	<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				    		| &nbsp;  <a href="http://www.mindthegaap.info/NormalSide.php" style="color: white">NORMAL SIDE</a> 
				    	</li>
				    	<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				    		| &nbsp;  <a href="http://www.mindthegaap.info/Users_Admin.php" style="color: white">USERS</a>
				    	</li>
    				</ul> -->

    				
  				</div>
  				<!-- <div class="float-right" style="margin-top: 8px">
			        	<a href="#" style="color:#ffffff; font-size: 16px"><span class="glyphicon glyphicon-log-out" style="color:#F6E7CB"></span> LOGOUT</a>
			    </div> -->
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