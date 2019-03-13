<?php
	include("../../config.php");
	
	session_start();

	if(isset($_SESSION['user'])){
		header('location: home.php');
	}

	if(isset($_POST['submit'])){
	//if(isset($_POST['login'])){
		$uname = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);

		if ($uname != '' && $pass != ''){
			$query = "SELECT count(*) as cntUser FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
			$result = mysqli_query($db,$query);
			$row = $result->fetch_assoc();
			$count = $row['cntUser'];
			
			$query1 = "SELECT * FROM USERS WHERE USER = '".$uname."' and PASS = password('".$pass."')";
			$result1 = mysqli_query($db,$query1);
			$row1 = $result1->fetch_assoc();

			if($count > 0){
				$_SESSION['user'] = $uname;
				$_SESSION['userid'] = $row1['USER_ID'];
				header('location: home.php');
			}
			else
			{
				echo "Invalid username or password.";
			}
		}
	}

?>
<html>
<head>
<title>Dappr Login</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="../style/main.css">

</head>
<body>
Dappr Login 
<form method="POST">
<input name="username" type="text" placeholder="USERNAME"/><br/>
<input name="password" type="password" placeholder="PASSWORD"/><br/>
<button type="submit" value="Submit" name="submit">Login</button>
</form>
<form action="register.php">
<button type = "submit" value="Register" name="register">Register</button>
</form>
</body>
</html>
