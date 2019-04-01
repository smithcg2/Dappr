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
                
                    $select = "SELECT * FROM visitor LEFT JOIN visitorEmergencyContact em ON visitor.Visitor_ID = em.Vis_ID WHERE visitor.Visitor_ID = '" . $ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"width: auto;\">";


                        echo "<center><h1>" . $row['Visitor_Fname'] . " " . $row['Visitor_MI'] . " " . $row['Visitor_Lname'] . "</h1>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "Previous Pet Owner?: </br>" . $row['Previous_Pet_Owner'] . "</br></br>";
                        echo "Allergies: </br>" . $row['Visitor_Allergies'] . "</br></br>";
                        echo "<h3>Emergency Contact:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Contact First Name</th><th>Contact Last Name</th><th>Contact Phone</th><th>Relation</th></tr>";
                        echo "<tr><td>" . $row['visitorContact_Fname'] . "</td><td>" . $row['visitorContact_Lname'] . "</td><td>" . $row['visitorContact_Phone'] . "</td><td>" . $row['visitorContact_Relation'] . "</td></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['Date_Time'] . "</td><td>" . $row['Procedure_Type'] . "</td><td>" . $row['Medication_Used'] . "</td><td>" . $row['Employee_ID'] . "</td><td>" . $row['Cost'] . "</td></tr>";
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
