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
        <button id="employeelogin" onclick="location.href='insertAnimal.html'">Insert Animal</button>

                       <form method="post" action = "showSpecificAnimals.php">
                       Search (ID, Name,or  Species):
                <input type="text" name="criteria">
                    <input type="submit" value="SEARCH">  
                </form>
                </td>
                <?php
                
                    $select = "SELECT * FROM animal WHERE Kennel_Number IS NOT NULL";
                    $result = $db->query($select);

                    if ($result->num_rows > 0) {
                    echo "<table border = \"1\" width = \"100%;\" style = \"text-align: center;\"><tr><th>Photo</th><th>ID</th><th>Name</th><th>Species</th><th>Spayed?</th><th>Clawed?</th><th>Location</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td><img src = \"./animalPhotos/".$row['Photo_ID']."\" width = \"100px;\"></td><td>".$row['Animal_ID']."</td><td>".$row['Animal_Name']."</td>
                        <td>".$row['Species']."</td><td>".$row['Spayed_Neutered']."</td><td>".$row['Clawed_Declawed']."</td>
                        <td> Kennel: ".$row['Kennel_Number']."</td>
                       <td> 
                       <form method=\"post\" action = \"selectAnimal.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Animal_ID'] ."\">
                    <input type=\"submit\" value=\"View More\">  
                </form>
                </td>
                       <td> 
                       <form method=\"post\" action = \"updateValueForm.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Animal_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Animal_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"animal\">
                
                <input type=\"hidden\" name=\"columns[]\" value= \"Animal_ID\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Animal_Name\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Species\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Breed\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Special Needs\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Spayed_Neutered\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Clawed_Declawed\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Kennel_Number\">
                <input type=\"hidden\" name=\"columns[]\" value= \"Photo_ID\">
                    <input type=\"submit\" value=\"Update Record\">  
                </form>
                </td>
                
                
                <td> 
               <form method=\"post\" action = \"deleteValue.php\">
                <input type=\"hidden\" name=\"ID\" value= \"" . $row['Animal_ID'] ."\">
                <input type=\"hidden\" name=\"TID\" value= \"Animal_ID\">
                <input type=\"hidden\" name=\"Tname\" value= \"animal\">
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
