<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "INSERT INTO visitorLog(Vis_ID,Fac_Number,Time_In,Time_Out)
                    VALUES
                    ('$_POST[Visitor_ID]','$_POST[Facility_Number]',
                    '$_POST[Time_In]','$_POST[Time_Out]')";

                    
                    
                    
                    
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"index.php\"</script>";
                }
                else
                {
                    echo "ERROR: " . $insert . "<br/>" . $db->error;
                }
                
                mysqli_close($db);
                
?>            
