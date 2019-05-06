<?php
	session_start();
//	function loginsubmit()
//	{
		if(getenv('REQUEST_METHOD') == "POST") {
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['password']);

			$sql = "SELECT * FROM Users WHERE Username = '$username' and Password = PASSWORD('$password')";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$active = $row['active'];


			$count = mysqli_num_rows($result);
			if ($count == 1) {
				session_register($username);
				$_SESSION['login_user'] = $username;
				echo "<script type='text/javascript'>document.location='pages/login.php';</script>";
				exit();
			}else{
				$error = "Your login name or password is incorrect.";
			}
		}
//	}

?>
