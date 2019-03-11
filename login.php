<?php
	include("config.php");
	session_start();

	if(getenv('REQUEST_METHOD') == "POST") {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		$sql = "SELECT * FROM Users WHERE Username = '$username' and Password = PASSWORD('$password')";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];


		$count = mysqli_num_rows($result);
		echo $count
		if ($count == 1) {
			session_register($username);
			$_SESSION['login_user'] = $username;
			$_SERVER['REQUEST_METHOD'] = "GET";
			echo "<script type='text/javascript'>document.location='welcome.php';</script>";
			exit();
		}else{
			$error = "Your login name or password is incorrect.";
		}
	}

?>
<html>
<body>
Welcome 
<form method="POST">
<input name="username" type="text"/><br/>
<input name="password" type="password"/><br/>
<button type="submit" value="Submit">SUBMIT</button>
</form>
</body>
</html>
