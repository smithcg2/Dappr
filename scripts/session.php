<?php
	include("../../config.php");
	session_start();;

	$user_check = $_SESSION['user'];

	$ses_sql = mysqli_query($db,"SELECT USER from USERS where Username = '$user_check'");

	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	$login_session = $row['USER'];

	if(!isset($_SESSION['user'])){
		header("location: index.php");
		die();
	}
?>
