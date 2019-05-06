<?php
	include("../../config.php");
	
	session_start();

	if(isset($_SESSION['user'])){
		header('location: home.php');
	}
	if(isset($_POST['register'])){
		header('location: register.php');
	}

	if(isset($_POST['login'])){
		$uname = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);

		if ($uname != '' && $pass != ''){
			$query = "SELECT count(*) as cntUser FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
			$result = mysqli_query($db,$query);
			$row = $result->fetch_assoc();
			$count = $row['cntUser'];
			

			if($count > 0){
				$_SESSION['user'] = $uname;
			$query1 = "SELECT * FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
}
			$result1 = mysqli_query($db,$query1);
			$row1 = $result1->fetch_assoc();
				$_SESSION['userid'] = $row1['USER_ID'];
				$_SESSION['fname'] = $row1['FNAME'];
				$_SESSION['mname'] = $row1['MNAME'];
				$_SESSION['lname'] = $row1['LNAME'];
				$_SESSION['city'] = $row1['CITY'];
				$_SESSION['state'] = $row1['STATE'];
				$_SESSION['zip'] = $row1['ZIP'];
				$_SESSION['joined'] = $row1['JOINED'];
				$_SESSION['email'] = $row1['EMAIL'];
				header('location: home.php');
			}
			else
			{
				echo "Invalid username or password.";
			}
		}

?>


<!doctype html>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<link rel="stylesheet" type="text/css" href="../style/responsive.css">
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
<img id="homelogotext" src="../images/logo_textonly.png" alt="Dappr">
</a>
</div>
<div id="wrapper">
	<div id="registerform">
<center><hr class="formsplit"/><h4 class="formlabel">Login to Dappr</h4><hr class="formsplit"/></center>
<form method="POST">
<input name="username" type="text" class="form-control" placeholder="Username"/><br/>
<input name="password" type="password" class="form-control" placeholder="Password"/><br/>
<button type="submit" value="Submit" class="btn btn-primary" name="login">Login</button>
<button type = "submit" value="Register" class="btn btn-default" name="register">Register</button>
</form>
</div>
</div>
</body>
</html>
