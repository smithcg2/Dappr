<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
                    
                    
                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    echo "ERROR: " . $insert . "<br/>" . $db->error;
                }
                
                mysqli_close($db);
                
                ?>            
