<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
                    
                    INSERT INTO visitor(Visitor_ID,Visitor_Fname,Visitor_MI,Visitor_Lname, Visitor_Allergies,Previous_Pet_Owner)

                    VALUES

    ('$_POST[Visitor_ID]','$_POST[Visitor_Fname]','$_POST[Visitor_MI]','$_POST[Visitor_Lname]','$_POST[Visitor_Allergies]','$_POST[Previous_Pet_Owner]')

                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    echo "ERROR: Please ensure that you have added a new Visitor ID"; 

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
 
                }
                
                mysqli_close($db);
                
                ?>            
