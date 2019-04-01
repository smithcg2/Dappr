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
        <button id="employeelogin" onclick="location.href='insertVisitor.html'">Insert Visitor</button>

                       <form method="post" action = "showSpecificVisitors.php">
                       Search (ID, Name):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM visitor";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>ID</th>
                    <th>Name</th>
                    <th>Allergies</th>
                    <th>Previous Pet Owner?</th>
                    </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Visitor_ID']."</td>
                        <td>".$row['Visitor_Fname']." ".$row['Visitor_MI']." ".$row['Visitor_Lname'] . "</td>
                        <td>".$row['Visitor_Allergies']."</td>
                        <td>".$row['Previous_Pet_Owner']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectVisitor.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Visitor_ID'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                       <td> 
                       <form method=\"post\" action = \"showVisitorLog.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Visitor_ID'] ."\">
                    <input type=\"submit\" value=\"View Visitor Log\">  
                </form>
                </td>
                       <td> 
                       <form method=\"post\" action = \"selectAdoptionByVis.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Visitor_ID'] ."\">
                    <input type=\"submit\" value=\"View Visitor Adoptions\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Visitor_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Visitor_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"visitor\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Visitor_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Visitor_Fname\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Visitor_MI\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Visitor_Lname\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Visitor_Allergies\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Previous_Pet_Owner\">
               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Visitor_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Visitor_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"visitor\">
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
