<?php

include('config.php');
                            
                
                               
                    $change = "UPDATE " . $_POST['Tname'] . " SET " . $_POST['dropdown'] . " = '" . $_POST['input'] . "' WHERE " . $_POST['TID'] . " = " . $_POST['ID'];
                if ($db->query($change) === TRUE)
                {
                     echo "<script> location.href = \"index.php\"</script>"; 
                }
                else
                {
                    echo "ERROR: " . $change. "<br/>" . $db->error;
                }
                                
                mysqli_close($db);
                
?>            
