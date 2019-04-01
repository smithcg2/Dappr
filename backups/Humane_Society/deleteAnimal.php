<?php

include('config.php');
                $Animal_ID = $_POST['ID'];
                 
                if (isset($Animal_ID))
                {
                
                    $delete = "Delete from animal where Animal_ID = '".$Animal_ID."'";
                    if ($db->query($delete) === TRUE)
                {
                }
                else
                {
                    echo "ERROR: " . $insert . "<br/>" . $db->error;
                }
                }
                else if (!isset($Animal_ID))
               {
                  echo "Please enter a valid input.";
              }
                else
                {
                    echo "ERROR";
                }
                
                mysqli_close($db);
                
                ?>            
