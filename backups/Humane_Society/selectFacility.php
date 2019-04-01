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
                
                    $select = "SELECT * FROM facility LEFT JOIN inventory inv ON facility.Facility_Number = inv.Facility_Num  WHERE facility.Facility_Number = '" . $ID . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

echo "<div style=\"width: auto;\">";


                        echo "<center><h1>" . $row['Building_Name'] . "</h1>";
                        echo "<h2>Phone: " . $row['Phone_Number'] . "</br></h2>";
                        echo "<h2>Address: " . $row['Address'] . " </h2>";
echo "<div style=\"width: 100%; text-align: top;\">";
                        echo "<h3>Inventory:</h3>";

                        echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Expiration</th></tr>";
                        echo "<tr><td>" . $row['Product_ID'] . "</td><td>" . $row['Product_Name'] . "</td><td>" . $row['Quantity'] . "</td><td>" . $row['Product_Price'] . "</td><td>" . $row['Expiration_Date'] . "</td></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['Product_ID'] . "</td><td>" . $row['Product_Name'] . "</td><td>" . $row['Quantity'] . "</td><td>" . $row['Product_Price'] . "</td><td>" . $row['Expiration_Date'] . "</td></tr>";
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
