<?php

include('config.php');
                 
                    $delete = "DELETE FROM " . $_POST['Tname'] . " WHERE " . $_POST['TID'] . " = " . $_POST['ID'];
                if ($db->query($delete) === TRUE)
                {
                     echo "<script> location.href = \"index.php\"</script>"; 
                }
                else
                {
                    echo "ERROR: " . $change. "<br/>" . $db->error;
                }
                
                mysqli_close($db);
                
?>            
