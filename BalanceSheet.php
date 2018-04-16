<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
	if(!empty($_GET['date'])){
    $date = $_GET['date'];
	}else{
		$date = "";
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Post.php"); ?>

<html lang="en">
	<head>
		<title>Balance Sheet</title>
	
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating --> 
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php"); ?>

	<body style="background-color:#FFFFFF">
	
			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php"); ?>	
		<div class="container">
			<!--<form action="includes/dcf_Write_Post.php" method="post"> -->
			<div class="row" style="margin-top: 30px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<!--<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">BALANCE SHEET</h1>
				</div> -->
				
			</div>
			<div style="text-align: center;" id="tester">
				<h3>Mind The Gaap</h3>
				<h4>Balance Sheet</h4>
				<!--<h6>For the Period Ending on </?php echo date("m/d/Y"); ?></h6> -->
				<h6>For the Period Ending on <span id="dateInsert" name="dateInsert" onload="test()"></span></h5>
			</div>
			<div class="row">
				<div class="col-xs-0 col-sm-0 col-md-7 col-lg-9"></div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-3">
					<div class="input-group date" id="datetimepicker6" data-target-input="nearest" style="padding-right: 20px">
						<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker6" size="12" id="datetime" name="datetime"/>
						<div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker"> 
							<div class="input-group-text" style="padding-left: 5px"><i class="fa fa-calendar fa-2x" style="padding-top: 3px"></i></div>
						</div>
						<button type="submit" class="btn btn-success" style="margin-left: 8px;">Go</button>
					</div>
				</div>
			</div>
			<div>
				<table>
					<thead>
					
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
			
		<!--</form> -->
		</div>		
		<script type="text/javascript">
			$('#datetimepicker6').datetimepicker({
			defaultDate: new Date(),
			format: 'MM/DD/YYYY', 
			useCurrent: true,
			maxDate: new Date(), 
			disabledDate: [
				new Date()
			]
			//disabledDate: [
			//	moment(new Date),
			//	new Date(2018, 11 - 1, 21),
			//	"11/22/2018 00:53"
			//]
			//startDate: '-7d',
			//endDate: '+0d'
		});
		$( document ).ready(function() {
			document.getElementById('dateInsert').innerHTML = document.getElementById('datetime').value;
		});
		</script>
	</body>
</html>
