<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Accounts.php") ?>

<html lang="en">
	<head>
		<title>ACCOUNTS</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">
		<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">ACCOUNTS</h1>
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					<a href="http://www.mindthegaap.info/Create_Accounts.php"><button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">CREATE ACCOUNT</button></a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="90%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>NAME</th>
			                <th>CATEGORY</th>
			                <th style="color:white;">&nbsp;</th>
			            </tr>
			        </thead>
			        <!-- uncomment if search bar per column is wanted -->
			        <tfoot>
			            <tr>
			                <th>Name</th>
			                <th>CATEGORY</th>
			                <th style="color: white">&nbsp;</th>
			            </tr>
			        </tfoot>
					<tbody style="margin-bottom: 10px;">
			 <?php while($data = $result->fetch_assoc()) { ?>
				    <tr>
			                <td><?php echo $data["accountName"]; ?></td>
			                <td><?php echo $data["category"]; ?></td>
			                <td><a href="http://www.mindthegaap.info/Edit_Accounts.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
			                </td>
			            </tr>
				<?php } ?>
			        </tbody>
			    </table>
			</div>
		</div>

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
		</script>
	</body>
</html>
