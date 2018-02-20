<?php
	include("includes/header.php");
	//check for user login session
	if(empty($_SESSION['logged'])){
		header('location: index.php');
	}
	include("includes/nav.php");

	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM `users` WHERE `id`=".$user_id;
	$res = mysql_query($sql);
	$user = mysql_fetch_object($res);
?>
<main>
	Welcome <?=$user->username ?>
</main>
<?php
	include("includes/footer.php");
?>
