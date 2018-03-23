<?php 
	session_start();
	if ($_SESSION['username'] == null) {
		header('Location: /index.php');
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_Post.php"); ?>

<html lang="en">
	<head>
		<title>POST</title>
		<style>
			body {font-family: Arial, Helvetica, sans-serif;}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				padding-top: 100px; /* Location of the box */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
				background-color: #fefefe;
				margin: auto;
				padding: 20px;
				border: 1px solid #888;
				width: 80%;
			}

			/* The Close Button */
			.close {
				color: #aaaaaa;
				float: right;
				font-size: 28px;
				font-weight: bold;
			}

			.close:hover,
			.close:focus {
				color: #000;
				text-decoration: none;
				cursor: pointer;
			}
		</style>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating --> 
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php"); ?>

	<body style="background-color:#FFFFFF">
	
			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php"); ?>	
		<div class="container">
			<form action="includes/dcf_Write_Post.php" method="post">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">POST</h1>
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 30px">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>DATE</th>
			                <th>REFERENCE ID</th>
			                <th>ACCOUNT</th>
			                <th>DEBIT</th>
							<th>CREDIT</th>
							<th>TYPE</th>
			                <th style="color:white;">&nbsp;</th>
			            </tr>
			        </thead>
			        <!-- uncomment if search bar per column is wanted -->
			        <!-- <tfoot>
			            <tr>
			                <th>DATE</th>
			                <th>REF</th>
			                <th>ACCOUNT</th>
			                <th>DR</th>
							<th>CR</th>
			                <th style="color: white">&nbsp;</th>
			            </tr>
			        </tfoot> -->
					<tbody style="margin-bottom: 10px;">
						<?php $currentDate =''; $fileCounter = 0; $editButtonCounter = 0; $currentGroupNumber = 1; $commentsCounter = 1;?>
						<?php while($data = $result->fetch_assoc()) { ?>
							<tr>
								<td><?php if($data['date'] != $currentDate && $data['creditDebit'] == "debit"){ echo $data["date"]; $currentDate = $data['date'];} ?></td>
								<td height="55px"><?php echo $data["referenceId"]; ?></td>
								<td width="25%"<?php if($data['creditDebit'] == 'credit') {echo 'style="padding-left: 75px;"';}?>><?php echo $data["accountName"]; ?></td>
								<td width="10%" style="text-align: right"><?php if ($data['creditDebit'] == 'debit'){echo number_format(doubleval($data["amount"]), 2, '.', ',');} ?></td>
								<td width="10%" style="text-align: right"><?php if ($data['creditDebit'] == 'credit'){echo number_format(doubleval($data["amount"]), 2, '.', ',');} ?></td>
								<td style="text-align: right"><?php echo $data['type'] ?></td>
								<td style="text-align: right">
									<?php if($data['status'] == "Pending" && $data['creditDebit'] == "debit" && $editButtonCounter == 0) { echo '<button type="submit" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px; margin-left: 0px" name="Approved" value="'.$data["journalGroup"].'">POST</button>
									<button type="button" id="rejectButton" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="background-color: #DD9787; border-bottom: 5px solid #990000; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px" value="'.$data["journalGroup"].'">REJECT</button>'; $editButtonCounter++;} elseif ($data['creditDebit'] == "credit") {$editButtonCounter = 0;} ?>
								</td>
							</tr>
							<?php if($commentsCounter == $data['numParts']) {echo '<tr><td></td><td></td><td>'.$data['comments'].'</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>'; $commentsCounter = 1;} else {$commentsCounter++;} ?>
						<?php } ?>
			        </tbody>
			    </table>
			</div>
			
			<!-- THE MODAL -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Modal Heading</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal Body -->
						<div class="modal-body">
							<b>Reason for Rejection: </b>
							<textarea class="form-control" rows="5" id="rejectReason" name="rejectReason"></textarea>
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="submit" id="modalSubmit" name="Rejected" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px; margin-left: 0px">SUBMIT</button>
							<button type="button" class="btn btn-basic" data-dismiss="modal" id="cancel">CANCEL</button>
						</div>
					</div>					
				</div>
			</div>
			<input type="hidden" name="editButtonSelected" id="edit_ButtonSelected" value="defaultValue";/>
		<input type="hidden" name="approveRejectedButton" id="approve_RejectedButton" value="defaultValue";/>
		</form>
		</div>		
		<script type="text/javascript">
			$("button").click(function() {
				//alert(this.value);
				if(this.id != "modalSubmit" && this.id != "cancel"){					
					document.getElementById("edit_ButtonSelected").value = this.value;
					//alert("GETTINGHERE");
					//document.getElementById("rejectBtn").value = this.value;
				}
				document.getElementById("approve_RejectedButton").value = this.name; 
			});
		</script>
	</body>
</html>
