<?php
require("../../config.php");
session_start();

	if(isset($_POST['closet'])){
		header('location: ../pages/closet.php');
	}
	if(isset($_POST['outfits'])){
		header('location: ../pages/outfits.php');
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header('location: ../pages/home.php');
	}

?>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135138799-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135138799-1');
</script>


</head>

	<body>

<div id="nav">
<a href="../pages/home.php">
<img id="homelogo" src="../images/logo_only.png" alt="logo">
<img id="logotext" src="../images/logo_textonly.png" alt="Dappr">
</a>
<div class="navbuttons">
	<form method='POST' action="">
	<input class='navbutton' type='submit' value='Closet' name='closet'>
	<input class='navbutton' type='submit' value='Outfits' name='outfits'>
	<input class='navbutton' type='submit' value='Logout' name='logout'>
	</form>
</div>
</div>
