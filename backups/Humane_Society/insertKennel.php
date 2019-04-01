<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
                    
                    INSERT INTO kennel(Kennel_Number,Type,Max_Occupancy,Facility_Num)

                    VALUES
                    ('$_POST[Kennel_Number]','$_POST[Type]','$_POST[Max_Occupancy]','$_POST[Facility_Num]')

                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                     echo "ERROR: Please ensure that the Kennel Number does not already exist
                                      or that the requested Facility Number exists";

                    ob_flush();

                    flush();

                    usleep(333500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
                }
                
                mysqli_close($db);
                
                ?>            
