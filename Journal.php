<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Journal.php") ?>
<html>
	<head>
		<title>Journalize</title>
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>
	<body style="background-color:#FFFFFF">
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>
		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">JOURNALIZE</h1>
				</div>

				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					<a href="http://www.mindthegaap.info/Create_JournalEntry.php"> <button type="button" class="btn btn-success create-button" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">NEW JOURNAL</button>
<!--
						<input type="text" class="the-date" name="the-date" style="width:0;height:0;opacity:0;">
-->
					</a>
				</div>
			</div>
			<form action="Edit_Journal.php" method="post">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table id="example" name="example" class="display table-striped" cellspacing="10" width="110%" style="margin-left: auto; margin-right: auto; color: #DD9787">
						<thead>
							<tr>
								<th colspan="1">DATE</th>
								<th colspan="1">ACCOUNT</th>
								<th colspan="1">REFERENCE ID</th>								
								<th colspan="1">DEBIT</th>
								<th colspan="1">CREDIT</th>
								<th colspan="1">STATUS</th>
								<th colspan="1">FILE</th>
<!--
								<th style="color: white">&nbsp;</th>
-->
							</tr>
						</thead>
						<!-- uncomment if search bar per column is wanted -->
						<tfoot>
							<tr role="row">
								<th>date</th>
								<th>account</th>
								<th>reference id</th>								
								<th>debit</th>
								<th>credit</th>
								<th>status</th>
								<th>file</th>
<!--
								<th>&nbsp;</th>
-->
							</tr>			        
						</tfoot>
						<tbody style="margin-bottom: 10px;">
							<?php $currentDate =''; $fileCounter = 0; $currentGroupNumber = 1; $commentsCounter = 1; $statusCounter = 0;?>
							<?php while($data = $result->fetch_assoc()) { ?> 
								
								<tr>
									<td><?php if($data['date'] != $currentDate && $data['creditDebit'] == "debit"){ echo $data["date"]; $currentDate = $data['date'];} ?></td>									
									<td width="25%"<?php if($data['creditDebit'] == 'credit') {echo 'style="padding-left: 75px;"';}?></td><?php echo $data["accountName"]; ?></td>
									<td height="55px"><?php echo $data["referenceId"]; ?></td>
									<td style="text-align: right"><?php if ($data['creditDebit'] == 'debit'){echo number_format(doubleval($data["amount"]), 2, '.', ',');} ?></td>
									<td style="text-align: right"><?php if ($data['creditDebit'] == 'credit'){echo number_format(doubleval($data["amount"]), 2, '.', ',');} ?></td>
									<td><?php if($statusCounter == 0 && $data['creditDebit'] == "debit"){echo $data["status"]; $statusCounter++;} elseif ($data['creditDebit'] == "credit") {$statusCounter = 0;}?></td>
									<td><?php if($fileCounter == 0 && $data['creditDebit'] == "debit"){ echo $data["filename"]; $fileCounter++;} elseif ($data['creditDebit'] == "credit") {$fileCounter = 0;} ?></td>
								</tr>
							<?php } ?>
									
						</tbody>
					</table>
				</div>	
			</form>
			</br></br></br></br></br>
		</div>		
<!--
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<script type="text/javascript">
		var todayDate = new Date();
		$(document).ready(function(){
			$('.the-date').datepicker({
				minDate: todayDate,
				dateFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					var selectedDate = $(this).val();
					window.location = "createJournalEntry.php?date="+selectedDate;
				}
			});
			$('.create-button').click(function(e){
				e.preventDefault();
				$('.the-date').datepicker("show");
			});
		});
-->
	<script type="text/javascript">
		//SINGLE SEARCH BAR FOR WHOLE DATATABLE
		$(document).ready(function() {
		    $('#example').DataTable( {
				"bSort": false
				});
		} );


		//DATATABLE THAT ALLOWS FOR SEARCHING INDIVIDUAL COLUMNS 
		$(document).ready(function() {
		    // Setup - add a text input to each footer cell
		    $('#example tfoot th').each( function () {
		        var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			} );
		 
		    // DataTable
		    var table = $('#example').DataTable();
		 
		    // Apply the search
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );
		$("button").click(function() {
			//alert(this.value);
			document.getElementById("edit_ButtonSelected").value = this.value;
		});
	</script>
	</body>
</html>
