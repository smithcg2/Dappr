<?php

include('config.php');

echo "<center><h1>Record Inserted Successfully!</h1></center>";

ob_flush(); 
flush();
usleep(3500000);

echo "<script>location.href = \"index.php\"</script>";
                
                mysqli_close($db);
                
                ?>            
