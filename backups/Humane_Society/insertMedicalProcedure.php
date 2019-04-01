<?php

include('config.php');

//put variables here

                //query for insert
                    $insert = "INSERT INTO medicalProcedures(Employee_ID,Animal_ID,Date_Time,Procedure_Type,Medication_Used,Cost)
VALUES
('$_POST[Employee_ID]','$_POST[Animal_ID]','$_POST[Date_Time]','$_POST[Procedure_Type]','$_POST[Medication_Used]','$_POST[Cost]')
";
   
if ($db->query($insert) === TRUE)
{
echo "<script>location.href = \"success.php\"</script>";
}
else
{
  echo "ERROR: Please ensure that the Employee ID and Animal ID exists";

                    ob_flush();

                    flush();

                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";

}
  
mysqli_close($db);
             
?>            
