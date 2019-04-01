<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
INSERT INTO activityLog(Activity_Visitor_ID, Activity_Animal_ID, Activity_Type, Time_In, Time_Out)
VALUES
('$_POST[Visitor_ID]','$_POST[Animal_ID]','$_POST[Activity_Type]',
'$_POST[Time_In]','$_POST[Time_Out]')                    
                    
                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    echo "ERROR: Please ensure that the Visitor ID and Animal ID exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

                }
                
                mysqli_close($db);
                
                ?>            
