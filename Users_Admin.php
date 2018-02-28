<html lang="en">
	<head>
		<title>Users Page</title>
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
    				<ul class="navbar-nav">
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
    				</ul>

    				
  				</div>
  				<div class="float-right" style="margin-top: 8px">
			        	<a href="#" style="color:#ffffff; font-size: 16px"><span class="glyphicon glyphicon-log-out" style="color:#F6E7CB"></span> LOGOUT</a>
			    </div>
			</nav>	
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-10">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">USER PROFILES</h1>
				</div>
				<div id="buttons" class="row col-xs-12 col-sm-12 col-md-2 col-lg-1 float-right">
					<!-- <button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">EXPORT LOG</button> -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="90%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>USER ID</th>
			                <th>FIRST NAME</th>
			                <th>LAST NAME</th>
			                <th>USERNAME</th>
			                <th>POSITION</th>
			                <th>STATUS</th>
			                <th>&nbsp;</th>
			            </tr>
			        </thead>
			        <!-- uncomment if search bar per column is wanted -->
			        <tfoot>
			            <tr>
			                <th>User ID</th>
			                <th>First Name</th>
			                <th>Last Name</th>
			                <th>Username</th>
			                <th>Position</th>
			                <th>Status</th>
			                <th>&nbsp;</th>
			            </tr>
			        </tfoot>
					<tbody style="margin-bottom: 10px;">
			            <tr>
			                <td>00001</td>
			                <td>Steve</td>
			                <td>Rogers</td>
			                <td>cap</td>
			                <td>Bartender</td>
			                <td>Inactive</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>00002</td>
			                <td>Tony</td>
			                <td>Stark</td>
			                <td>iron_man</td>
			                <td>Genius, Billionaire, Playboy, Philanthropist</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>00003</td>
			                <td>Peter</td>
			                <td>Parker</td>
			                <td>spidey</td>
			                <td>Awkard Teenager</td>
			                <td>Inactive</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>00004</td>
			                <td>Peter</td>
			                <td>Quill</td>
			                <td>starlord</td>
			                <td>Guardian of the Galaxy</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>00005</td>
			                <td>Thor</td>
			                <td>Odin's Son</td>
			                <td>point_break</td>
			                <td>God of Thunder</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			             <tr>
			                <td>00006</td>
			                <td>Wade</td>
			                <td>Wilson</td>
			                <td>captain_deadpool</td>
			                <td>Merc with a Mouth</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
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
			    	null,
			    	null,
			    	null,
			    	null,
			    	null,
			    	null,
			    	{ "width": "5%"},
			    	]
			    }
			    );

			    var buttons = new $.fn.dataTable.Buttons(table, {
				     buttons: [
				    	{
					        extend: 'collection',
			                text: 'Export User List',
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