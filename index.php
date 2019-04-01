<?php
require("../config.php");
session_start();



	if(isset($_POST['login'])){
		$uname = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);

		if ($uname != '' && $pass != ''){
			$query = "SELECT count(*) as cntUser FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
			$result = mysqli_query($db,$query);
			$row = $result->fetch_assoc();
			$count = $row['cntUser'];
			
			$query1 = "SELECT * FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
		} else {
			header('location: pages/login.php');
		}

			$result1 = mysqli_query($db,$query1);
			$row1 = $result1->fetch_assoc();

			if($count > 0){
				$_SESSION['user'] = $uname;
				$_SESSION['userid'] = $row1['USER_ID'];
				header('location: pages/home.php');
			}
			else
			{
				header('location: pages/login.php');
			}
	}

	if(isset($_POST['register'])){
		header('location: pages/register.php');
	}
	if(isset($_POST['logout'])){
		session_destroy();
	}
	
	$userbuttons = '';
	if(isset($_SESSION['user'])){
		$userbuttons = 'hidden';
	}

?>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
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
<a href="pages/home.php"><img id="homelogo" src="images/logo_only.png" alt="logo">
<img id="homelogotext" src="images/logo_textonly.png" alt="Dappr">
</a>
<div class="navbuttons">
	<form method='POST' action="">
<input name="username" type="text" class="index-login" placeholder="Username"/>
<input name="password" type="password" class="index-login" placeholder="Password"/>
	<input class='navbutton' type='submit' value='Login' name='login'>
	<input class='navbutton' type='submit' value='Register' name='register'>
	</form>
</div>
</div>
<div id="wrapper">
<div id="home-intro">
<center>
<h1>Introduction</h1>
<h2>This is currently a work in progress for a capstone project.</h2>
<h3>Cameron Smith</h3>
<h3>Email me any questions: <a href="mailto:questions@dappr.app">questions@dappr.app</a></h3>
</center>
<div id="searchcloset">
<center>
<h1>Check Out Our Closet!</h1>
			<form class="searchclosetform" method="POST" action="">
			<input type="search" placeholder="Search our clothes!"></input><br/>
			<input class='submit' type='submit' value='Search' name='Search'>
			<input class='submit' type='submit' value='Advanced Search' name='AdvancedSearch'>
			<br/>
				<a href="addclothes.php">Want to help? Add Clothes</a>
			</form>
</center>
</div>
<div id="home-images">
Images
</div>
</div>
</div>
<?php include("scripts/footer.php"); ?>
</body>
</html>
