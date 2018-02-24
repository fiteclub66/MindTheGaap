<html lang="en">
	<head>
		<title>Chart of Accounts</title>
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
		 
		<!-- DataTables javascript-->
		<!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


	  	<!-- Bootstrap CSS -->
	  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


	  	<!-- ajax javascript-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

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
				    		| &nbsp;  <a href="http://www.mindthegaap.info/Users_General.php" style="color: white">USERS</a>
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
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">CHART OF ACCOUNTS</h1>
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					<button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">ADD ACCOUNT</button>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="90%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>NAME</th>
			                <th>NUM</th>
			                <th>BALANCE</th>
			                <th>STATUS</th>
			                <th style="color:white;">&nbsp;</th>
			            </tr>
			        </thead>
			        <!-- uncomment if search bar per column is wanted -->
			        <!-- <tfoot>
			            <tr>
			                <th>Name</th>
			                <th>Num</th>
			                <th>Balance</th>
			                <th>Status</th>
			                <th style="color: white">&nbsp;</th>
			            </tr>
			        </tfoot> -->
					<tbody style="margin-bottom: 10px;">
			            <tr>
			                <td>CASH</td>
			                <td>105</td>
			                <td>$1000.00</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>ACCOUNTS PAYABLE</td>
			                <td>106</td>
			                <td>$1000.00</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>OWNERS EQUITY</td>
			                <td>204</td>
			                <td>$1000.00</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>EQUIPMENT</td>
			                <td>405</td>
			                <td>$1000.00</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			            <tr>
			                <td>CORPORATE PAYOFFS</td>
			                <td>222</td>
			                <td>$1000.00</td>
			                <td>Active</td>
			                <td><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button>
			                </td>
			            </tr>
			             <tr>
			                <td>PONZI</td>
			                <td>786</td>
			                <td>$1000.00</td>
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
			$(document).ready(function() {
			    $('#example').DataTable();
			} );


			//DATATABLE THAT ALLOWS FOR SEARCHING INDIVIDUAL COLUMNS 
			// $(document).ready(function() {
			//     // Setup - add a text input to each footer cell
			//     $('#example tfoot th').each( function () {
			//         var title = $(this).text();
			//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			//     } );
			 
			//     // DataTable
			//     var table = $('#example').DataTable();
			 
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
		</script>
	</body>
</html>