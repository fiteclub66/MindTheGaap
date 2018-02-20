<?php
	include("includes/header.php");
	//check for user login session
	if(empty($_SESSION['logged'])){
		header('location: index.php');
	}
	include("includes/nav.php");
?>
<main>
	
</main>
<?php
	include("includes/footer.php");
?>
