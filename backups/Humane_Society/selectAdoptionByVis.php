<html>
<head>
    <title>Watauga Humane Society Database</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet1.css">
    <link rel="icon" src="images/favicon.png">
    <!--css and other information-->
    </head>
    <body>
        <div id="wrap">
            <div id="main">
        <a href="index.php" id="nostylelink"><div id ="titlebar">
            Watauga Humane Society Database
        </div></a>
            <center>


<?php
    include("config.php");

                $Visitor_ID = $_POST['ID'];

                
                    $select = "SELECT * FROM adoptions,animal,visitor WHERE Adoption_Animal_ID = Animal_ID AND Adoption_Visitor_ID = '" . $Visitor_ID . "'Group By Adoption_Animal_ID;";
                    $result = $db->query($select);

                    
                   if ($result->num_rows > 0)
                   {
                    echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Photo ID</th><th>Name</th><th>Species</th><th>Date Adopted</th>";
                                        while($row = $result->fetch_assoc()) {
                        echo "<tr><td><img src = \"./animalPhotos/".$row['Photo_ID']."\" width = \"100px;\"></td><td>".$row['Animal_Name']."</td><td>
                       ".$row['Species']."</td><td>".$row['Date_Time']." </td></tr>";
                    }

                   echo "</table>";
                   } 
                   else
                   {
                    echo "0 results";
                   }

                
                mysqli_close($db);
                
?>            
                
                </center>
                <div id="normal">
                <a href="index.php"><button>Back</button></a>
                </div>
            </div>
        </div>
</body>
</html>
