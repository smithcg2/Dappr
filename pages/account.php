<?php
	include("../../config.php");
	include("../../session.php");
	session_start();

	if(isset($_POST['updateaccount'])) {
		$sql = "UPDATE USERS SET USER = '".$_POST['user']."', EMAIL = '".$_POST['email']."', FNAME = '".$_POST['fname']."', MNAME = '".$_POST['mname']."', LNAME = '".$_POST['lname']."', CITY = '".$_POST['city']."', STATE = '".$_POST['state']."', ZIP = '".$_POST['zip']."' WHERE USER_ID = '".$_SESSION['userid']."'";
		$db->query($sql);
		header('location: logout.php');
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
<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../images/logo_only.png" style="width: 100px; height: 100px;"class="avatar img-circle" alt="avatar">
	  <!--
	  <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
	-->
	</div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" name="user" type="text" value="<?php echo (isset($_SESSION['user'])?$_SESSION['user']:"error"); ?>">
            </div>
	  </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="fname" type="text" value="<?php echo (isset($_SESSION['fname'])?$_SESSION['fname']:"First Name"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="mname" type="text" value="<?php echo (isset($_SESSION['mname'])?$_SESSION['mname']:"Middle Name"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
	      <input class="form-control" name="lname" type="text" value="<?php echo (isset($_SESSION['lname'])?$_SESSION['lname']:"Last Name"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="email" value="<?php echo (isset($_SESSION['email'])?$_SESSION['email']:"Email"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">City:</label>
            <div class="col-lg-8">
              <input class="form-control" name="city" type="text" value="<?php echo (isset($_SESSION['city'])?$_SESSION['city']:"City"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">State:</label>
            <div class="col-lg-8">
              <input class="form-control" name="state" type="text" value="<?php echo (isset($_SESSION['state'])?$_SESSION['state']:"State"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Zip:</label>
            <div class="col-lg-8">
              <input class="form-control" name="zip" type="text" value="<?php echo (isset($_SESSION['zip'])?$_SESSION['zip']:"Zip"); ?>">
            </div>
          </div>
	<!--
          <div class="form-group">
            <label class="col-md-3 control-label">Change Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="password">
            </div>
	  </div>
	-->
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes" name="updateaccount">
              <span></span>
	      <a href="home.php"><input type="button" class="btn btn-default" value="Cancel"></a>
            </div>
          </div>
	<h6><?php echo "Joined: " . $_SESSION['joined'] . " User# " . $_SESSION['userid'] ?></h6>
        </form>
      </div>
  </div>
</div>
<hr>

</body>
</html>
