<?php

include('../../config.php');
include('../scripts/session.php');

		$userid = $_SESSION['userid'];

		include("../scripts/buildelems.php");
?>           


        <div id="wrapper">
<div id="title">Check out your closet!</div>
<center>

<a href="addclothes.php"><button>Add Clothes</button></a><br/>

<?php

		$sql = 'SELECT * FROM CLOSET WHERE USER_ID = '.$userid;

		
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

			    echo "<a href = 'updateclothes.php?id=".$row['CLOTHING_ID']."' ><div class='clothingdiv'>";
				echo "<img class='clothingimg' src = '../uploads/".(mysqli_fetch_row($db->query("SELECT IMG FROM CLOTHING WHERE CLOTHING_ID = ".$row['CLOTHING_ID'].""))[0])."'>";	    
			    echo "<h3>".(mysqli_fetch_row($db->query("SELECT NAME FROM CLOTHING WHERE CLOTHING_ID = ".$row['CLOTHING_ID'].""))[0])."</h3>";
			    echo "<span class='clothingsize'>Size: ".$row['SIZE']." ".$row['SIZE2']."</span> ";
			    echo "<span class='units'>Units: ".$row['UNITS']."</span>";

			    echo "</div></a>";	    

                    }
                } else {
			echo "Nothing Here :(";
		}

?>
</center>
            </div>
	</div>
	<?php include("../scripts/footer.php");?>
    </body>
</html>


