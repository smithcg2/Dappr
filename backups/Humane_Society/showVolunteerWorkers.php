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
                
                    $select = "SELECT * FROM volunteer LEFT JOIN volunteerWorker vw ON volunteer.Volunteer_ID = vw.VolunteerWorker_ID WHERE volunteer.Volunteer_ID = '" . $ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"width: auto;\">";


                        echo "<center><h1>" . $row['Vol_FName'] . " " . $row['Vol_MI'] . " " . $row['Vol_LName'] . "</h1>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "Organization: </br>" . $row['Organization'] . "</br></br>";
                        echo "Phone: </br>" . $row['Vol_Phone'] . "</br></br>";
                        echo "<h3>Volunteer Work Log:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Facility Number</th><th>Time In</th><th>Time Out</th></tr>";
                        echo "<tr><td>" . $row['volunteerWorker_FacilityNum'] . "</td>
                        <td>" . $row['volunteerWorker_TimeIn'] . "</td>
                        <td>" . $row['volunteerWorker_TimeOut'] . "</td>
                        </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['volunteerWorker_FacilityNum'] . "</td>
                        <td>" . $row['volunteerWorker_TimeIn'] . "</td>
                        <td>" . $row['volunteerWorker_TimeOut'] . "</td>
                        </tr>";
                    }
                    echo "</table>";



echo "</div>";
                    }

                }
                else if (!isset($ID))
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
