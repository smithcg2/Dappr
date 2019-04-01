<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "
                    
                            
                           INSERT INTO inventory(Product_ID,Product_Name,Quantity,Product_Price,Expiration_Date,Facility_Num)

                            VALUES

        ('$_POST[Product_ID]','$_POST[Product_Name]','$_POST[Quantity]','$_POST[Product_Price]','$_POST[Expiration_Date]','$_POST[Facility_Num]')

                    ";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                     echo "ERROR: Please ensure that you have added a new Product ID or that the requested Facility exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
                }
                
                mysqli_close($db);
                
                ?>            
