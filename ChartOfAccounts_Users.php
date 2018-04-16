<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_ChartOfAccounts.php") ?>

<html lang="en">
	<head>
		<title>CHART OF ACCOUNTS</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">
		<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">CHART OF ACCOUNTS</h1>
				</div>
				
			</div>
			<form action="Edit_ChartOfAccounts.php" method="post">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
						<thead>
							<tr>
								<th>NAME</th>
								<th>ACCOUNT NUMBER</th>
								<th>BALANCE</th>
								<th>STATUS</th>
								<th>CATEGORY</th>
								<th>SUBCATEGORY</th>
								<th>NORMAL SIDE</th>
							</tr>
						</thead>
						<!-- uncomment if search bar per column is wanted -->
						<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
						<tbody style="margin-bottom: 10px;">
				 <?php while($data = $result->fetch_assoc()) { ?>
						<tr>
								<td><?php echo $data["accountName"]; ?></td>
								<td><?php echo $data["accountId"]; ?></td>
								<td>$<?php echo number_format(doubleval($data["balance"]), 2, '.', ','); ?></td>
								<td><?php echo $data["active"]; ?></td>
								<td><?php echo $data["category"];?></td>
								<td><?php echo $data["subcategory"];?></td>
								<td><?php echo $data["normalSide"];?></td>							
							</tr>
					<?php } ?>
						</tbody>
					</table>
				</div>
				<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value="defaultValue"/>
			</form>
		</div>

		<script type="text/javascript">
			//SINGLE SEARCH BAR FOR WHOLE DATATABLE
			$(document).ready(function() {
			    $('#example').DataTable( {
					"bSort": false
					});
			} );
			
			//used for passing which edit button is selected to backend for pre-populating edit screen fields
			$("button").click(function() {
				//alert(this.value);
				document.getElementById("edit_ButtonSelected").value = this.value;
			});

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
		</script>
	</body>
</html>
