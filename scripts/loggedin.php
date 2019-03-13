<?php
	//check for session
	if(!isset($_SESSION['user'])){
		header('location: ../index.php');
	}
?>
