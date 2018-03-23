<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_EventsLog.php") ?>

<html lang="en">
	<head>
		<title>LOGS</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>		
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">LOGS</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>EVENT</th>
			                <th>CHANGE</th>
			                <th>FROM</th>
			                <th>TO</th>
			                <th>AUTHOR</th>
			                <th>DATE</th>
			            </tr>
			        </thead>
			        <!-- uncomment if search bar per column is wanted -->
			        <tfoot>
			            <tr>
			                <th>Event</th>
			                <th>Change</th>
			                <th>From</th>
			                <th>To</th>
			                <th>Author</th>
			                <th>Date</th>
			            </tr>
			        </tfoot>
					<tbody style="margin-bottom: 10px;">
			            <?php while($data = $result->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $data["eventId"]; ?></td>
			                <td><?php echo $data["changeField"]; ?></td>
			                <td><?php echo $data["beforeValue"]; ?></td>
			                <td><?php echo $data["afterValue"]; ?></td>
			                <td><?php echo $data["username"]; ?></td>
			                <td><?php echo $data["time"]; ?></td>
						</tr>
						<?php } ?>
			        </tbody>
			    </table>
			</div>
		</div>

				<script type="text/javascript">
			//SINGLE SEARCH BAR FOR WHOLE DATATABLE
			// $(document).ready(function() {
			//     $('#example').DataTable();
			// } );


			//DATATABLE THAT ALLOWS FOR SEARCHING INDIVIDUAL COLUMNS 
			// $(document).ready(function() {
			//     // Setup - add a text input to each footer cell
			//     $('#example tfoot th').each( function () {
			//         var title = $(this).text();
			//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			//     } );
			 
			//     // DataTable
			//     var table = $('#example').DataTable( {

			//         dom: 'Bfrtip Br',
			//         buttons: [
			//             'copyHtml5',
			//             'excelHtml5',
			//             'csvHtml5',
			//             'pdfHtml5'
			//         ]
			//     }, {
			//     	"columns": [
			//     	{ "width": "19%"},
			//     	{ "width": "25%"},
			//     	null,
			//     	null,
			//     	null,
			//     	null
			//     	]
			//     }
			//     );
			 
			//     // Apply the search
			//     table.columns().every( function () {
			//         var that = this;
			 
			//         $( 'input', this.footer() ).on( 'keyup change', function () {
			//             if ( that.search() !== this.value ) {
			//                 that
			//                     .search( this.value )
			//                     .draw();
			//             }
			//         } );
			//     } );
			// } );




			$(document).ready(function() {
			    // Setup - add a text input to each footer cell
			    $('#example tfoot th').each( function () {
			        var title = $(this).text();
			        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			    } );
			 
			    // DataTable
			    var table = $('#example').DataTable( {
			    	"columns": [
			    	{ "width": "19%"},
			    	{ "width": "25%"},
			    	null,
			    	null,
			    	null,
			    	null
			    	]
			    }
			    );

			    var buttons = new $.fn.dataTable.Buttons(table, {
				     buttons: [
				    	{
					        extend: 'collection',
			                text: 'Export Log',
			                buttons: [
			                    'copy',
			                    'excel',
			                    'csv',
			                    'pdf'
			                ]
			            }
				    ]
				}).container().appendTo($('#buttons'));
			 
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

			// document.getElementById("copyHtml5").style.color= "blue";

//	CODE SPECIFICALLY FOR EXPORTING TABLE
// 			$(document).ready(function() {
//     $('#example').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );
// } );
		</script>
	</body>
</html>
