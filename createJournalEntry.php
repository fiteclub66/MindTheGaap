<?php
	if(!empty($_GET['date'])){
		$date = $_GET['date'];
	}else{
		$date = "";
	}
	echo $date;
?>