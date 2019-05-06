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
			
		} else {
			header('location: pages/login.php');
		}


			if($count > 0){
				$query1 = "SELECT * FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
				$result1 = mysqli_query($db,$query1);
				$row1 = $result1->fetch_assoc();
				
				$_SESSION['user'] = $uname;
				$_SESSION['userid'] = $row1['USER_ID'];
				$_SESSION['fname'] = $row1['FNAME'];
				$_SESSION['mname'] = $row1['MNAME'];
				$_SESSION['lname'] = $row1['LNAME'];
				$_SESSION['city'] = $row1['CITY'];
				$_SESSION['state'] = $row1['STATE'];
				$_SESSION['zip'] = $row1['ZIP'];
				$_SESSION['joined'] = $row1['JOINED'];
				$_SESSION['email'] = $row1['EMAIL'];
				
				
				
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
<div id="home-wrapper">
<div id="home-intro">
<h1>Welcome to Dappr!</h1>
<center>
<h2>That period of time in the morning before leaving for work never feels quite long enough. Whether it's the weight of the impending work day or the menial personal tasks (going to the gym, preparing meals, showering, getting dressed), waking up always seems too early and work seems to come too soon. Dappr simplifies the mornings, in turn, allowing more time to focus on…whatever else!</h2><br/>
<h2>Dappr is a product that intelligently organizes mens' wardrobes and assembles outfits for them on a daily basis to give them back some time in their morning.</h2>
</center>
</div>
<!--<div id="searchcloset">
<center>
<h1>Check Out Our Closet!</h1>
			<form class="searchclosetform" method="POST" action="">
			<input type="search" placeholder="Search our clothes!"></input><br/>
			<input class='submit' type='submit' value='Search' name='Search'>
			<input class='submit' type='submit' value='Advanced Search' name='AdvancedSearch'>
			<br/>
				<a href="pages/addclothes.php">Want to help? Add Clothes</a>
			</form>
</center>
</div>-->
<div id="home-images">
<div class="img-wrap1">
	<img src="images/hiking.jpg">
</div>
<div class="img-wrap2">
	<img src="images/acc.jpg">
</div>
<div class="img-wrap3">
	<img src="images/hangers.jpg">
</div>
</div>
</div>
</div>
<?php include("scripts/footer.php"); ?>
</body>
</html>
