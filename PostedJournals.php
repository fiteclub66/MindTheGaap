<?php 
	session_start();
	//if ($_SESSION['username'] == null) {
		//header('Location: /index.php');
	//}
	//echo "variable: ".$_SESSION['postedJournalPage'];
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_PostedJournals.php") ?>
<!--</?php include ($_SERVER['DOCUMENT_ROOT']."/includes/testAll.php") ?> -->

<html>
	<head>
		<title>Account Ledger</title>
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>
	<body style="background-color:#FFFFFF">
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>
		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">ACCOUNT LEDGER</h1>
				</div>

				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					
<!--
						<input type="text" class="the-date" name="the-date" style="width:0;height:0;opacity:0;">
-->
				</div>
			</div>
			<form action="includes/dcf_ReadPopulate_PostedJournals.php" method="post" id = "formSubmit">
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="margin-top: 40px">
					<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<select class="form-control pull-right" id="account_Name" name="accountName"> <!-- onchange="this.form.submit()" -->
						    <option value="" disabled="true" selected style="color: #D3D3D3;">Account Name</option>
						    <?php if ($result2->num_rows > 0) {while($dropdownData = $result2->fetch_assoc()) { ?>	
							<option value=<?php echo $dropdownData['systemId']?> <?php if($dropdownData['systemId'] == $_SESSION['postedJournalPage']) {echo "selected";} ?>> <?php echo $dropdownData["accountId"] . " - " . $dropdownData["accountName"] ?></option>					    
							<?php }} ?>
						</select>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="text-align: right"><h2 id="title" style="color: #A6C48A"><?php if ($result3->num_rows > 0) {while($titleFill = $result3->fetch_assoc()) {echo $titleFill['accountId'] . " - " . $titleFill['accountName']; }}?></h2></div>
					
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 30px">
					<table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
						<thead>
							<tr>
								<th colspan="1">DATE</th>
								<th colspan="1">REFERENCE ID</th>								
								<th colspan="1">DEBIT</th>
								<th colspan="1">CREDIT</th>
								<th colspan="1">BALANCE</th>
<!--
								<th style="color: white">&nbsp;</th>
-->
							</tr>
						</thead>
						<!-- uncomment if search bar per column is wanted -->
						<tfoot>
							<tr role="row">
								<th></th>
								<th></th>
								<th></th>								
								<th></th>
								<th></th>
<!--
								<th>&nbsp;</th>
-->
							</tr>			        
						</tfoot>
						<tbody style="margin-bottom: 10px;">
							<?php $currentDate =''; $fileCounter = 0; $currentGroupNumber = 1; $commentsCounter = 1; $statusCounter = 0; $runningBalance = 0;?>
							<?php if ($result->num_rows > 0) {while($data = $result->fetch_assoc()) { ?> 
								
								<tr>
									<td><?php echo $data["date"]; ?></td>
									<td height="55px"><?php echo $data["referenceId"]; ?></td>					
									<td style="text-align: right">
										<?php if ($data['creditDebit'] == 'debit'){
											echo number_format(doubleval($data["amount"]), 2, '.', ',');
											$runningBalance = $runningBalance + doubleval($data['amount']);
											} ?>
									</td>
									<td style="text-align: right">
										<?php if ($data['creditDebit'] == 'credit'){
											echo number_format(doubleval($data["amount"]), 2, '.', ',');
											$runningBalance = $runningBalance - doubleval($data['amount']);
										} ?>
									</td>
									<td style="text-align: right"><?php echo number_format(doubleval($runningBalance), 2, '.', ',') ?></td>
								</tr>
							<?php }} ?>
									
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
		
		//var select = document.getElementById("account_Name");
		//select.onchange = function(){
			//var selectedString = select.options[select.selectedIndex].value;
			////alert(selectedString);
			//$("#title").text(document.getElementById("account_Name").name);
		//}
		
		$('#formSubmit').change(
			function(){
				 //$(this).closest('form').trigger('submit');
				 /* or:
				 $('#formElementId').trigger('submit');
					or:*/
				 $('#formSubmit').submit();
				 
			}
		);
		
		
	</script>
	</body>
</html>
