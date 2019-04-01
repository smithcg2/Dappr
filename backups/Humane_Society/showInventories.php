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
        <button id="employeelogin" onclick="location.href='insertInventory.html'">Insert Inventory</button>

                       <form method="post" action = "showSpecificInventories.php">
                       Search (ID, Name, or Facility Number):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM inventory";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Exp Date</th>
                    <th>Facility</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Product_ID']."</td>
                        <td>".$row['Product_Name']."</td>
                        <td>".$row['Quantity']."</td>
                        <td>".$row['Product_Price']."</td>
                        <td>".$row['Expiration_Date']."</td>
                        <td>".$row['Facility_Num']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectInventory.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Product_ID'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Product_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Product_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"inventory\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Product_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Product_Name\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Quantity\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Product_Price\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Expiration_Date\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Facility_Num\">
               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Product_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Product_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"inventory\">
                <input type=\"submit\" value=\"Delete\">  
                </form>
                </td>
                        
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
