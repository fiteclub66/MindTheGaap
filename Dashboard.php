<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
	//	header('Location: /index.php');
	//}
	include ($_SERVER['DOCUMENT_ROOT']."/includes/NetIncomeCalculation.php");
	include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Dashboard.php");

	$nameROA = "ROA";
	$valueROA = (float)$netIncome/$totalAssets;
	$nameROE = "ROE";
	$valueROE = 1;
	$nameNPM = "NPM"; //Add the name here
	$valueNPM = 1; //Add value here
	$nameORTA = "ORTA"; //Add the name here
	$valueORTA = 1; //Add value here
	$nameAT = "AT";
	$valueAT = 1;
	$nameCR = "CR"; //Add the name here
	$valueCR = 1; //Add value here
	$nameQR = "QR"; //Add the name here
	$valueQR = 1; //Add value her


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

		        drawGauge1('gauge-1',0,20,'<?=$nameROA ?>',<?=$valueROA ?>,0,3,3,7,7,20); //AT
		        drawGauge1('gauge-2',0,20,'<?=$nameROE ?>',<?=$valueROE ?>,0,2,2,5,5,20); //CR
		        drawGauge1('gauge-3',0,20,'<?=$nameNPM ?>',<?=$valueNPM ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-4',0,20,'<?=$nameORTA ?>',<?=$valueORTA ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-5',0,20,'<?=$nameAT ?>',<?=$valueAT ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-6',0,20,'<?=$nameCR ?>',<?=$valueCR ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        drawGauge1('gauge-7',0,20,'<?=$nameQR ?>',<?=$valueQR ?>,<?=$redLow ?>,<?=$redHigh ?>,<?=$yellowLow ?>,<?=$yellowHigh ?>,<?=$greenLow ?>,<?=$greenHigh ?>);
		        
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
