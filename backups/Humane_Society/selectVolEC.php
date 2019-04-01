<?php
    include("config.php");

                $Vol_FName = $_POST['Vol_FName'];
                
                $Vol_LName = $_Post['Vol_LName'];
                 

                if (isset($Vol_FName) and isset($Vol_LName))
                {
                
                    $select = "SELECT volContact_Fname,volContact_Lname,volContact_Phone,volContact_Relation FROM volunteerEmergenctContact,volunteer WHERE Volunteer_ID = vol_ID and volConact_Fname = '".$Vol_FName."' and volContact_Lname = '".$Vol_LName."'";
                    $result = $db->query($select);

                   
                   if ($result->num_rows > 0)
                   {
                    echo "<table width = \"90%;\" style = \"text-align: center;\"><th>First Name</th><th>Last Name</th><th>Phone</th><th>Relation</th> ";
                                        while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row['volContact_Fname']."</td><td>
                       ".$row['volConact_Lname']."</td><td>".$row['volContact_Phone']."</td><td>".$row['volContact_Relation']."</th></tr>";
                    }

                   echo "</table>";
                   } 
                   else
                   {
                    echo "0 results";
                   }


                
              echo "<a href = \"index.php\"><center> Back to Home  </a>"; 
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
                
