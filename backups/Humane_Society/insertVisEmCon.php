<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "INSERT INTO visitorEmergencyContact(visContact_Fname, visContact_Minit, visContact_Lname, visContact_Phone, visContact_Relation, Vis_ID)
                    VALUES
                    ('$_POST[emContact_Fname]','$_POST[emContact_Minit]','$_POST[emContact_Lname]',
                    '$_POST[emContact_Phone]','$_POST[emContact_Relation]','$_POST[emVis_ID]'
                    )";

                    
                    
                    
                    
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    echo "ERROR: Please ensure that the Visitor ID exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

                }
                
                mysqli_close($db);
                
                ?>            
