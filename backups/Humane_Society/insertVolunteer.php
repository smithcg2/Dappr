<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "

INSERT INTO volunteer(Volunteer_ID,Vol_Fname,Vol_Mi,Vol_Lname,DOB,Vol_Phone,
Vol_Email,Organization,Vol_Allergies,Signed_Release)
VALUES
('$_POST[Volunteer_ID]','$_POST[Vol_Fname]','$_POST[Vol_MI]',
'$_POST[Vol_Lname]','$_POST[DOB]','$_POST[Vol_Phone]','$_POST[Vol_Email]',
'$_POST[Organization]','$_POST[Vol_Allergies]','$_POST[Signed_Release]')

                    ";
                                                                                                  
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                   echo "ERROR: Please ensure that you have added a new Volunteer ID"; 

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

                }
                
                mysqli_close($db);
                
                ?>            
