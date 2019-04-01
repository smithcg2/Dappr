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

                $ID = $_POST['Volunteer_ID'];

                if (isset($ID))
                {
                
                    $select = "SELECT * FROM volunteer LEFT JOIN volunteerEmergencyContact em ON volunteer.Volunteer_ID = em.vol_ID WHERE volunteer.Volunteer_ID = '" . $ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"width: auto;\">";


                        echo "<center><h1>" . $row['Vol_FName'] . " " . $row['Vol_MI'] . " " . $row['Vol_LName'] . "</h1>";
                        echo "<h2>Date Of Birth: " . $row['dob'] . "</br></h2>";
                        echo "<h2>Phone: " . $row['Vol_Phone'] . "</br></h2>";
                        echo "<h2>Email: " . $row['Vol_Email'] . " </h2>";
                        echo "<h2>Organizations: " . $row['Vol_Organization'] . "</br></h2>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "Signed Release?: </br>" . $row['Signed_Release'] . "</br></br>";
                        echo "Allergies: </br>" . $row['Vol_Allergies'] . "</br></br>";
                        echo "<h3>Emergency Contact:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Contact First Name</th><th>Contact Last Name</th><th>Contact Phone</th><th>Relation</th></tr>";
                        echo "<tr><td>" . $row['volContact_Fname'] . "</td><td>" . $row['volContact_Lname'] . "</td><td>" . $row['volContact_Phone'] . "</td><td>" . $row['volContact_Relation'] . "</td></tr>";
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
