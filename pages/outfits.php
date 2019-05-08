<?php

include('../../config.php');
include('../scripts/session.php');

		$userid = $_SESSION['userid'];

		include("../scripts/buildelems.php");
?>           


        <div id="wrapper">
<div id="title">Check out your outfits!</div>
<center>

<a href="addoutfits.php">Generate New Outfits</a><br/><br/>
<?php

		$sql = 'SELECT * FROM OUTFIT WHERE USER_ID = '.$userid;

		
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
			    while($row = $result->fetch_assoc()) {

			    echo ("<!--<a href='viewOutfit.php?id=".$row['OUTFIT_ID']."'>--><div id='".$row['OUTFIT_ID']."' class='outfitdiv'><center>".
				    "<img class='outfitimg-large' src='../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = '".$row['TOP_ID']."'"))[0])."'>".
				    "<img class='outfitimg-large' src='../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = '".$row['BOTTOM_ID']."'"))[0])."'><br/>".
				    "<img class='outfitimg-small' src='../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = '".$row['ACC_ID']."'"))[0])."'>".
				    "<img class='outfitimg-small' src='../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = '".$row['SHOES_ID']."'"))[0])."'>".
				    "<img class='outfitimg-small' src='../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = '".$row['OUT_ID']."'"))[0])."'>".
				    "</center></div><!--</a>-->");
                    }
                } else {
			echo ", You're All Out!";
		}

?>
</center>
             </div>
            </div>
	</div>
	<?php include("../scripts/footer.php");?>
    </body>
</html>


