<?php
	include("../scripts/session.php");

	if(isset($_POST['logout'])){
		session_destroy();
		header('location: ../index.php');
	}

	$query = "SELECT * FROM USERS WERE USER_ID = '".$_SESSION['userid']."'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$fname = $row['FNAME'];
	$lname = $row['LNAME'];
?>
<!doctype html>
<html>
<head>
	<title>Dappr - <?php echo($fname." ".$lname) ?></title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
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
		<h1>Welcome, <?php echo($_SESSION['user']); ?></h1>
		<form method='POST' action="">
			<input type="submit" value="Logout" name="logout">
		</form>
	</body>
</html>
