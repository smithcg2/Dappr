<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
                    
                   INSERT INTO facility(Facility_Number,Building_Name,Address,Phone_Number)

    VALUES

    ('$_POST[Facility_Number]','$_POST[Building_Name]','$_POST[Address]',
'$_POST[Phone_Number]')

                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                     echo "ERROR: Please ensure that you have added a new Facility Number";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
                }
                
                mysqli_close($db);
                
                ?>            
