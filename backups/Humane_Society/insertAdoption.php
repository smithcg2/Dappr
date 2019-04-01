<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
SET FOREIGN_KEY_CHECKS = 0;
                    
INSERT INTO adoptions(Adoption_Visitor_ID,Adoption_Animal_ID,Date_Time,Fees_Paid)
VALUES
('$_POST[Visitor_ID]','$_POST[Animal_ID]','$_POST[Date_Time]',
'$_POST[fees]');

UPDATE animal SET Kennel_Number = NULL WHERE Animal_ID = '$_POST[Animal_ID]';

SET FOREIGN_KEY_CHECKS = 1;                    
                    
                    ";
                    
                if ($db->multi_query($insert) === TRUE)
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
