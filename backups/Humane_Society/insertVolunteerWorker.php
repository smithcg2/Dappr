<?php

include('config.php');

//put variables here

//query for insert
$insert = "INSERT INTO volunteerWorker (volunteerWorker_ID, volunteerWorker_FacilityNum, volunteerWorker_TimeIn, volunteerWorker_TimeOut)
    VALUES
    ('$_POST[Vol_ID]','$_POST[Facility_Num]','$_POST[Time_In]','$_POST[Time_Out]')";                                                                          
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                   echo "ERROR: Please ensure the Volunteer ID and Facility Number exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

                }
                
                mysqli_close($db);
                
?>            
