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
        <button id="employeelogin" onclick="location.href='insertKennel.html'">Insert Kennel</button>

                       <form method="post" action = "showSpecificKennel.php">
                       Search (ID, Name,or  Species):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM kennel";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>Kennel Number</th>
                    <th>Type</th>
                    <th>Max Occupancy</th>
                    <th>Facility</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Kennel_Number']."</td>
                        <td>".$row['Type']."</td>
                        <td>".$row['Max_Occupancy']."</td>
                        <td>".$row['Facility_Num']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectKennel.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Kennel_Number'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Kennel_Number'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Kennel_Number\">
                <input type=\"hidden\" name=\"Tname\" value= \"kennel\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Kennel_Number\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Type\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Max_Occupancy\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Facility_Num\">
               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Kennel_Number'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Kennel_Number\">
                <input type=\"hidden\" name=\"Tname\" value= \"kennel\">
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
