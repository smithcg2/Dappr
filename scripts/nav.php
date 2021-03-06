<?php
require("../../config.php");
session_start();
?>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<link rel="stylesheet" type="text/css" href="../style/responsive.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="../scripts/openWeather/src/openweather.js"></script>

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

<header class="header">
  <a href="../pages/home.php"><img id="homelogo" src="../images/logo_only.png"><img id="logotext" src="../images/logo_textonly.png"></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="../pages/closet.php">My Closet</a></li>
    <li><a href="../pages/outfits.php">My Outfits</a></li>
    <li><a href="../pages/account.php">My Account</a></li>
    <li><a href="../pages/logout.php">Logout</a></li>
  </ul>
</header>
