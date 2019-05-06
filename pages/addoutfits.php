<?php

include('../../config.php');
include('../scripts/session.php');


	$userid = $_SESSION['userid'];
	$clothingids = "";
	$rank = '50';
	$weather = 'Sunny/Warm';
	$top = "";
	$bottom = "";
	$shoe = "";
	$accessory = "";
	$outerwear = "";

                if (isset($_POST['submit']))
		{
			if($_POST['top'] == "On") {
				$row = mysqli_fetch_row($db->query("SELECT CLOTHING.CLOTHING_ID 
						   FROM CLOTHING, CLOSET 
						   WHERE USER_ID = '$userid' AND TYPE = 'Shirt'
					           ORDER BY RAND()
						   LIMIT 1"));
				$top = $row[0];
			}
			if($_POST['bottom'] == "On") {
				$row = mysqli_fetch_row($db->query("SELECT CLOTHING.CLOTHING_ID 
						   FROM CLOTHING, CLOSET 
						   WHERE USER_ID = '$userid' AND TYPE = 'Pants' OR TYPE = 'Shorts'
					           ORDER BY RAND()
						   LIMIT 1"));
				$bottom = $row[0];
			}
			if($_POST['shoe'] == "On") {
				$row = mysqli_fetch_row($db->query("SELECT CLOTHING.CLOTHING_ID 
						   FROM CLOTHING, CLOSET 
						   WHERE USER_ID = '$userid' AND TYPE = 'Shoes'
					           ORDER BY RAND()
						   LIMIT 1"));
				$shoe = $row[0];
			}
			if($_POST['accessory'] == "On") {
				$row = mysqli_fetch_row($db->query("SELECT CLOTHING.CLOTHING_ID 
						   FROM CLOTHING, CLOSET 
						   WHERE USER_ID = '$userid' AND TYPE = 'Accessory' OR TYPE = 'Tie' OR TYPE = 'Belt' OR TYPE = 'Other'
					           ORDER BY RAND()
						   LIMIT 1"));
				$accessory = $row[0];
			}
			if($_POST['outerwear'] == "On") {
				$row = mysqli_fetch_row($db->query("SELECT CLOTHING.CLOTHING_ID 
						   FROM CLOTHING, CLOSET 
						   WHERE USER_ID = '$userid' AND TYPE = 'Outerwear'
					           ORDER BY RAND()
						   LIMIT 1"));
				$outerwear = $row[0];
			}

			$clothingids = $top.','.$bottom.','.$shoe.','.$accessory.','.$outerwear;

			$insert = "INSERT INTO OUTFIT (`USER_ID`,`CLOTHING_IDS`,`RANK`,`WEATHER_CREATED`) VALUES ('$userid','$clothingids','$rank','$weather');";
			if ($db->query($insert))
                	{
                    		header('location: home.php');
                	}
                	else
                	{
                    
                    		echo "Error: " . $insert . "" . mysqli_error($db);
                    
                    		ob_flush();

                    		flush();
                    
                    		usleep(5000000);
				header("location:javascript://history.go(-1)");
			}
                }
                else if (!isset($name))
                {
                    echo "Please enter a valid input.";
                }
                else
                {
                    echo "ERROR";
                }
                
                mysqli_close($db);

		include("../scripts/buildelems.php");
?>           


        <div id="wrapper"><center>
<div id="title">What do you need in an outfit?</div>
<form id="clothesform" action="" method="POST" enctype="multipart/form-data">
<table><tr><center>
<td>
<label for="top">Top</label>
<input type="checkbox" name="top" id="top" class="checkbox" value = "On"></input>
</td>
<td>
<label for="bottom">Bottom</label>
<input type="checkbox" name="bottom" id="bottom" class="checkbox" value="On"></input>
</td>
<td>
<label for="outerwear">Outerwear</label>
<input type="checkbox" name="outerwear" id="outerwear" class="checkbox" value="On"></input>
</td>
<td>
<label for="shoes">Shoes</label>
<input type="checkbox" name="shoes" id="shoes" class="checkbox"></input>
</td>
<td>
<label for="accessory">Accessory</label>
<input type="checkbox" name="accessory" id="accessory" class="checkbox"></input>
</td></center>
</tr></table>
<input type="submit" name="submit" value="Submit">
</form>
<a href="home.php"><button>Home</button></a></center>
            </div>
	</div>
	<?php include("../scripts/footer.php");?>
    </body>
</html>


