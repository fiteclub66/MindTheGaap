<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}

	$name1 = "AT";
	$value1 = 1;
	$name2 = "CR";
	$value2 = 1;
	$name3 = "ATR"; //Add the name here
	$value3 = 1; //Add value here
	$name4 = "ROE"; //Add the name here
	$value4 = 1; //Add value here
	$name5 = "GPM"; //Add the name here
	$value5 = 1; //Add value here
	$name6 = "NPM"; //Add the name here
	$value6 = 1; //Add value here
	$name7 = "QR"; //Add the name here
	$value7 = 1; //Add value here
	$name8 = "CA"; //Add the name here
	$value8 = 1; //Add value here
	$name9 = "PM"; //Add the name here
	$value9 = 1; //Add value here
	$name10 = "CRS"; //Add the name here
	$value10 = 1; //Add value here


	$redLow = 0;
	$redHigh = 5;
	$yellowLow = 5;
	$yellowHigh = 10;
	$greenLow = 10;
	$greenHigh = 20;
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Post.php"); ?>

<html lang="en">
	<head>
		<title>Dashboard</title>
		<style type="text/css">
			.gauge{
				width: 250px;
				height: 250px;
				display: block;
				margin: 0 auto;
				float: left;
			}
		</style>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating --> 
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php"); ?>

	<body style="background-color:#FFFFFF">
	
			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php"); ?>	
		<div class="container">
			<!--<form action="includes/dcf_Write_Post.php" method="post"> -->
			<div class="row" style="margin-top: 40px">
				<div class="col-xs-12">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">DASHBOARD</h1>
					<div class="">
				       <div id="gauge-1" class="gauge"></div>
				       <div id="gauge-2" class="gauge"></div>
				       <div id="gauge-3" class="gauge"></div>
				    </div>
				 	<div class="">   
				       <div id="gauge-4" class="gauge"></div>
				       <div id="gauge-5" class="gauge"></div>
				       <div id="gauge-6" class="gauge"></div>
				    </div>
				    <div class=""> 
				       <div id="gauge-7" class="gauge"></div>
				       <div id="gauge-8" class="gauge"></div>
				       <div id="gauge-9" class="gauge"></div>
				    </div>
				    <div class=""> 
				       <div id="gauge-10" class="gauge"></div>
				    </div>
				</div>
				
			</div>
			
			
		<!--</form> -->
		</div>		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		      
		      
		      google.charts.load('current', {'packages':['gauge']});
		      google.charts.setOnLoadCallback(drawGauges);

		      function drawGauges() {

		        drawGauge1('gauge-1',0,20,'<?=$name1 ?>',<?=$value1 ?>,0,3,3,7,7,20); //AT
		        drawGauge1('gauge-2',0,20,'<?=$name2 ?>',<?=$value2 ?>,0,2,2,5,5,20); //CR
		        drawGauge1('gauge-3',0,20,'<?=$name3 ?>',<?=$value3 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-4',0,20,'<?=$name4 ?>',<?=$value4 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-5',0,20,'<?=$name5 ?>',<?=$value5 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-6',0,20,'<?=$name6 ?>',<?=$value6 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-7',0,20,'<?=$name7 ?>',<?=$value7 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-8',0,20,'<?=$name8 ?>',<?=$value8 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-9',0,20,'<?=$name9 ?>',<?=$value9 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-10',0,20,'<?=$name10 ?>',<?=$value10 ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);

		      }

		      function drawGauge1(element,min,max,name,value,redLow,redHigh,yellowLow,yellowHigh,greenLow,greenHigh){
		      	var data = google.visualization.arrayToDataTable([
		          ['Label', 'Value'],
		          [name, value],
		        ]);

		        var options = {
		          width: 250, height: 250,
		          redFrom: redLow, redTo: redHigh,
		          yellowFrom:yellowLow, yellowTo: yellowHigh,
		          greenFrom:greenLow, greenTo: greenHigh,
		          minorTicks: 0,
		          min: min,
		          max: max
		        };

		        var chart = new google.visualization.Gauge(document.getElementById(element));
		        chart.draw(data, options);
		      }
		</script>
	</body>
</html>
