<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_UsersAdmin.php") ?>

<html lang="en">
	<head>
		<title>Users Page</title>
	  	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>	
		

		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">USER PROFILES</h1>
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					<a href="http://www.mindthegaap.info/Create_Users.php"><button type="button" class="btn btn-success" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">CREATE USER</button></a>
				</div>
			</div>
			<?php if(!empty($_GET['addsuccess']) || !empty($_GET['editsuccess'])){ ?>
				<div class="row">
					<div class="col col-xs-2  col-lg-1"></div>
					<div class="col col-xs-8  col-lg-10">
						<?php if(!empty($_GET['addsuccess']) && $_GET['addsuccess']=='true'){ ?>
							<div class="alert alert-success" role="alert">User has been successfully created.</div>
						<?php }else if(!empty($_GET['addsuccess']) && $_GET['addsuccess']=='false'){ ?>
							<div class="alert alert-danger" role="alert">There was a problem in user creation.</div>
						<?php } ?>

						<?php if(!empty($_GET['editsuccess']) && $_GET['editsuccess']=='true'){ ?>
							<div class="alert alert-success" role="alert">User has been successfully updated.</div>
						<?php }else if(!empty($_GET['editsuccess']) && $_GET['editsuccess']=='false'){ ?>
							<div class="alert alert-danger" role="alert">There was a problem in updating user.</div>
						<?php } ?>
					</div>
					<div class="col col-xs-8 col-lg-1"></div>
				</div>
			<?php } ?>
			<form action="Edit_Users.php" method="post">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
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
							<?php while($data = $result->fetch_assoc()) { ?>
						<tr>
								<td><?php echo $data["userId"]; ?></td>
								<td><?php echo $data["firstName"]; ?></td>
								<td><?php echo $data["lastName"]; ?></td>
								<td><?php echo $data["username"]; ?></td>
								<td><?php echo $data["position"]; ?></td>
								<td><?php echo $data["active"]; ?></td>
								<td><button type="submit" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px" value = <?php echo $data["systemId"]?>>EDIT</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value="defaultValue"/>
			</form>
		</div>

		<script type="text/javascript">





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

			$("button").click(function() {
				//alert(this.value);
				document.getElementById("edit_ButtonSelected").value = this.value;
			});
			
		</script>
	</body>
</html>
