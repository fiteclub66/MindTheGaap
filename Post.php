<!doctype html>
<!doctype html>
<html lang="en">
	<head>
		<title>POST</title>
	<!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
	<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

	<body style="background-color:#FFFFFF">

			<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>	
<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">POST</h1>
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table id="example" name="example" class="display table-striped" cellspacing="10" width="90%" style="margin-left: auto; margin-right: auto; color: #DD9787">
			        <thead>
			            <tr>
			                <th>DATE</th>
			                <th>REF</th>
			                <th>ACCOUNT</th>
			                <th>DR</th>
							<th>CR</th>
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
			 <?php while($data = $result->fetch_assoc()) { ?>
				    <tr>
			                <td><?php echo $data["time"]; ?></td>
			                <td><?php echo $data["ref"]; ?></td>
			                <td>$<?php echo $data["accountName"]; ?></td>
			                <td><?php echo $data["debits"]; ?></td>
				 			<td><?php echo $data["credits"]; ?></td>
			                <td><a href="http://www.mindthegaap.info/Post"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">POST</button></a>
				 			<td><a href="http://www.mindthegaap.info/Post.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">REJECT</button></a>
			                </td>
			            </tr>
				<?php } ?>
			        </tbody>
			    </table>
			</div>
		</div>
	
	
		</script>
	</body>
</html>