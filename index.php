<?php

	if(isset($_POST['logout'])){
		session_destroy();
	}

?>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="style/main.css">
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
<center>
<img src="images/logo.png" alt="logo">
<h1>Welcome to Dappr!</h1>
<h2>This is currently a work in progress for a capstone project.</h2>
<h3>Cameron Smith</h3>
<h3>Email me any questions: <a href="mailto:questions@dappr.app">questions@dappr.app</a></h3>

<button><a href = "pages/login.php">Login</a></button>
		<form method='POST' action="">
			<input type="submit" value="Logout" name="logout">
		</form>

</center>
<br/>
</body>
</html>