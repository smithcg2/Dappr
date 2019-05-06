<?php

include('../../config.php');
include('../scripts/session.php');

		$userid = $_SESSION['userid'];

		include("../scripts/buildelems.php");
?>           


        <div id="wrapper">
<div id="title">Check out your outfits!</div>
<center>

<a href="addoutfits.php">Generate New Outfits</a>
<?php

		$sql = 'SELECT * FROM OUTFITS WHERE USER_ID = '.$userid;

		
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                    echo "<table id='clothestable' border = \"1\" width = \"100%;\" style = \"text-align: center;\"><tr><th>Photo</th><th>Name</th><th>Style</th><th>Size</th><th>Units</th><th>Rank</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
		        echo "<tr><td><img src = \"../uploads/".$row['IMG']."\" width = \"100px;\"></td><td>".$row['NAME']."</td><td>".$row['STYLE']."</td> <td>".$row['SIZE']." ".$row['SIZE2']."</td><td>".$row['UNITS']."</td><td>".$row['RANK']."</td></tr>";
                    }
                    echo "</table>";
                } else {
			echo ", You're All Out!";
		}

?>
</center>
<div id="normal">
<a href="home.php"><button>Home</button></a>
             </div>
            </div>
	</div>
	<?php include("../scripts/footer.php");?>
    </body>
</html>


