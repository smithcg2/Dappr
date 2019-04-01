<?php
    include("config.php");
?>
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
        <a href="index.php" id="nostylelink"><div id="titlebar">
            Watauga Humane Society Database
        </div></a>
                <div id="welcome">ALL ADOPTIONS!</div>
            
                <?php
                
                    $select = "SELECT * FROM animal, adoptions WHERE animal.Kennel_Number IS NULL GROUP BY Animal_ID";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Photo</th><th>ID</th><th>Name</th><th>Species</th><th>Date Adopted</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<center><tr><td><img src = \"./animalPhotos/".$row['Photo_ID']."\" width = \"100px;\"></td><td>".$row['Animal_ID']."</td><td>".$row['Animal_Name']."</td>
                        <td>".$row['Species']."</td><td>".$row['Date_Time']."</td>
                        </tr>
                        ";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
}

                
                mysqli_close($db);
                
                ?>            
                
                
                <div id="normal">
                <a href="index.php"><button>Back</button></a>
                </div>
            </div>
        </div>    
    </body>
</html>
