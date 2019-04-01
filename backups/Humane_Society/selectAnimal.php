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

                $Animal_ID = $_POST['ID'];

                if (isset($Animal_ID))
                {
                
                    $select = "SELECT * FROM animal LEFT JOIN medicalProcedures med ON animal.Animal_ID = med.Animal_ID WHERE animal.Animal_ID = '" . $Animal_ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"float:left;width:50%;\">";

                        echo "<center><img src = \"./animalPhotos/" . $row['Photo_ID'] . "\" alt= \"Photo\" width = \"200px\" style =\"float:right; text-align: right; margin-right: 15px;\"\><br/>";
echo "</center></div>";
echo "<div style=\"width: auto;\">";

$adopted = "no";

if (empty($row['Kennel_Number']))
{
$adopted = "yes";
}

                        echo "<h1>" . $row['Animal_Name'] . "</h1>";
                        echo "<h2>Species: " . $row['Species'] . "</br></h2>";
                        echo "<h2>Breed: " . $row['Breed'] . "</br></h2>";
                        echo "<h2>Kennel #: " . $row['Kennel_Number'] . " </h2>";
                        echo "<h2>Adopted?: " . $adopted . "</br></h2>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "Special Needs: </br>" . $row['Special_Needs'] . "</br></br>";
                        echo "<center><h3>MEDICAL RECORD:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Date Time</th><th>Procedure Type</th><th>Medication Used</th><th>Employee ID</th><th>Cost</th></tr>";
                        echo "<tr><td>" . $row['Date_Time'] . "</td><td>" . $row['Procedure_Type'] . "</td><td>" . $row['Medication_Used'] . "</td><td>" . $row['Employee_ID'] . "</td><td>" . $row['Cost'] . "</td></tr>";
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
