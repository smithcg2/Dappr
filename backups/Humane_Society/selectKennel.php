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
                
                <?php

                $ID = $_POST['ID'];

                if (isset($ID))
                {
                
                    $select = "SELECT * FROM kennel LEFT JOIN animal a ON kennel.Kennel_Number = a.Kennel_Number WHERE kennel.Kennel_Number = '" . $ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"width: auto;\">";


                        echo "<center><h1>Kennel: " . $row['Kennel_Number'] . "</h1>";
                        echo "<h2>Type: " . $row['Type'] . "</br></h2>";
                        echo "<h2>Max Occupancy: " . $row['Max_Occupancy'] . " </h2>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "<h3>Animals:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Animal ID</th><th>Animal Name</th><th>Species</th></tr>";
                        echo "<tr><td>" . $row['Animal_ID'] . "</td><td>" . $row['Animal_Name'] . "</td><td>" . $row['Species'] . " </td></tr>" ;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['Animal_ID'] . "</td><td>" . $row['Animal_Name'] . "</td><td>" . $row['Species'] . "</td><td>" ;
                    }
                    echo "</table>";



echo "</div>";
                    }

                }
                else if (!isset($Animal_ID))
                {
                    echo "Please enter a valid input.";
                }
                else
                {
                    echo "ERROR";
                }
                
                mysqli_close($db);
                
                ?>            
                
                
                <div id="normal">
                <a href="index.php"><button>Next</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
