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
        <button id="employeelogin" onclick="location.href='insertEmployee.html'">Insert Employee</button>

                       <form method="post" action = "showSpecificEmployees.php">
                       Search (ID, First Name, Last Name, or Facility):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM employee WHERE Employee_ID = '" . $_POST['criteria'] . "' 
                    OR Emp_FName = '" . $_POST['criteria'] . "' 
                    OR Emp_LName = '" . $_POST['criteria'] . "' 
                    OR Facility_Number = '" . $_POST['criteria'] . "'";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\">
                    <tr><th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Facility</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>".$row['Employee_ID']."</td>
                        <td>".$row['Emp_FName']." ".$row['Emp_MI']." ".$row['Emp_LName'] . "</td>
                        <td>".$row['Emp_Phone']."</td><td>".$row['Emp_Email']."</td>
                        <td>".$row['Facility_Number']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectEmployee.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Employee_ID'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                <td> 
                <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Employee_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Employee_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"employee\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Employee_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"SSN\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_FName\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_MI\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_LName\">
                <input type=\"hidden\" name=\"columns[]\" value= \"dob\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_Phone\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_Email\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Start_Date\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Skills_Certifications\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Skills_Certifications\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_Allergies\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Emp_PayRate\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Super_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Facility_Number\">

               
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Employee_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Employee_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"employee\">
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
