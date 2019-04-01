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
        <button id="employeelogin" onclick="location.href='insertFacility.html'">Insert Facility</button>

                       <form method="post" action = "showSpecificFacilities.php">
                       Search (ID, Address):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM facility";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>Facility Number</th>
                    <th>Building Name</th>
                    <th>Address</th>
                    <th>Phone Number</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Facility_Number']."</td>
                        <td>".$row['Building_Name']. "</td>
                        <td>".$row['Address']."</td>
                        <td>".$row['Phone_Number']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectFacility.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Facility_Number'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Facility_Number'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Facility_Number\">
                <input type=\"hidden\" name=\"Tname\" value= \"facility\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Facility_Number\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Building_Name\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Address\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Phone_Number\">
               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Facility_Number'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Facility_Number\">
                <input type=\"hidden\" name=\"Tname\" value= \"facility\">
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
