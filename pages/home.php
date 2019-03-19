<?php
	include("../scripts/session.php");

	$query = "SELECT * FROM USERS WERE USER_ID = '".$_SESSION['userid']."'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$fname = $row['FNAME'];
	$lname = $row['LNAME'];
	
	include("../scripts/buildelems.php");

?>
<div id="wrapper">
<center>		
<h1>Current Weather</h1>
</center>
<div class="lastOutfit">
<h2>Last Outfit</h2>
</div>
<div class="recomendedOutfit">
<h2>Recommended Outfit</h2>
</div>
<div class="rightHome">
<h2>Menu?</h2>
</div>
</div>
<?php include("../scripts/footer.php"); ?>
	</body>
</html>
