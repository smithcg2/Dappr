<?php

include('config.php');

//put variables here

$insert = "";

if(($_POST[Super_ID]) == "")
{
 $insert .= "

                   INSERT INTO employee(Employee_ID,SSN,Emp_Fname,Emp_Mi,Emp_Lname,DOB,Emp_Phone,
Emp_Email,Start_Date,Skills_Certifications,Emp_Allergies,Emp_PayRate, Super_ID,Facility_Number)
VALUES
('$_POST[Employee_ID]','$_POST[SSN]','$_POST[Emp_FName]','$_POST[Emp_MI]',
'$_POST[Emp_LName]','$_POST[dob]','$_POST[Emp_Phone]','$_POST[Emp_Email]','$_POST[Start_Date]',
'$_POST[Skills_Certifications]','$_POST[Emp_Allergies]','$_POST[Emp_PayRate]',NULL,'$_POST[Facility_Number]');

                    ";
   
}
else
{

                //query for insert

                    $insert .= "
                    
                   INSERT INTO employee(Employee_ID,SSN,Emp_Fname,Emp_Mi,Emp_Lname,DOB,Emp_Phone,
Emp_Email,Start_Date,Skills_Certifications,Emp_Allergies,Emp_PayRate,Super_ID,Facility_Number)
VALUES
('$_POST[Employee_ID]','$_POST[SSN]','$_POST[Emp_FName]','$_POST[Emp_MI]',
'$_POST[Emp_LName]','$_POST[dob]','$_POST[Emp_Phone]','$_POST[Emp_Email]','$_POST[Start_Date]',
'$_POST[Skills_Certifications]','$_POST[Emp_Allergies]','$_POST[Emp_PayRate]','$_POST[Super_ID]','$_POST[Facility_Number]')
                    
                    ";
}                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {

                    echo "ERROR: Please ensure that you have added a new Employee ID or that the requested Facility Number exists";

                    ob_flush();

                    flush();

                    usleep(3500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
 
                }
                
                mysqli_close($db);

                ?>            
