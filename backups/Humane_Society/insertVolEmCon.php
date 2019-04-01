<?php

include('config.php');

//put variables here

                //query for insert
      $insert = "INSERT INTO volunteerEmergencyContact(volContact_Fname, volContact_Minit, volContact_Lname, volContact_Phone, volContact_Relation, vol_ID)
              VALUES
              ('$_POST[emContact_Fname]','$_POST[emContact_Minit]','$_POST[emContact_Lname]',
              '$_POST[emContact_Phone]','$_POST[emContact_Relation]','$_POST[emVol_ID]'
              )";
             
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    echo "ERROR: Please ensure that the Volunteer ID exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

                }
                
                mysqli_close($db);
                
                ?>            
