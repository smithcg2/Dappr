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
        <button id="employeelogin" onclick="location.href='insertVolunteer.html'">Insert Volunteer</button>

                       <form method="post" action = "showSpecificVolunteers.php">
                       Search (ID, Name):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM volunteer";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Allergies</th>
                    <th>Signed Release</th>
                    </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Volunteer_ID']."</td>
                        <td>".$row['Vol_FName']." ".$row['Vol_MI']." ".$row['Vol_LName'] . "</td>
                        <td>".$row['Vol_Email']."</td>
                        <td>".$row['Vol_Phone']."</td>
                        <td>".$row['Vol_Allergies']."</td>
                        <td>".$row['Signed_Release']."</td>

                       <td> 
                       <form method=\"post\" action = \"selectVolunteer.php\">
                <input type=\"hidden\" name=\"Volunteer_ID\" value= \"" . $row['Volunteer_ID'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                       <td> 
                       <form method=\"post\" action = \"showVolunteerWorkers.php\">
                <input type=\"hidden\" name=\"Volunteer_ID\" value= \"" . $row['Volunteer_ID'] ."\">
                    <input type=\"submit\" value=\"View Volunteer Log\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Volunteer_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Volunteer_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"volunteer\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Volunteer_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Volunteer_FName\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Volunteer_MI\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Volunteer_LName\">
                <input type=\"hidden\" name=\"columns[]\" value= \"dob\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Vol_Phone\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Vol_Email\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Organization\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Vol_Allergies\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Signed_Release\">
               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Volunteer_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Volunteer_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"volunteer\">
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
