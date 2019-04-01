<?php

include('config.php');

                $Animal_ID = $_POST['ID'];
                $name = $_POST['name'];
                $species = $_POST['species'];
                $breed = $_POST['breed'];
                $specneeds = $_POST['specneeds'];
                $spay = $_POST['spay'];
                $claw = $_POST['claw'];
                $kennel = $_POST['kennel'];
if ($_FILES['file_upload']['error'] == 0)
{

// Check for errors
if($_FILES['file_upload']['error'] > 0 && $_FILES['file_upload']['error'] != 4){
    die('An error ocurred when uploading.');
}

if(!getimagesize($_FILES['file_upload']['tmp_name'])){
    die('Please ensure you are uploading an image.');
}

// Check filesize
if($_FILES['file_upload']['size'] > 500000){
    die('File uploaded exceeds maximum upload size.');
}

// Check if the file exists
if(file_exists('upload/' . $_FILES['file_upload']['name'])){
    die('File with that name already exists.');
}

// Upload file
if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'animalPhotos/' . $_FILES['file_upload']['name'])){
    die('Error uploading file - check destination is writeable.');
}

                $photo = $_FILES['file_upload']['name'];
}
else
{
                $photo = "default.jpg";
}
                if (isset($Animal_ID))
                {
                
                    $insert = "INSERT INTO animal VALUES('$Animal_ID', '$name', '$species', '$breed', 
                    '$specneeds', '$spay', '$claw', '$kennel', '$photo')";
                    
                if ($db->query($insert) === TRUE)
                {
                    echo "<script>location.href = \"success.php\"</script>";
                }
                else
                {
                    
                    echo "ERROR: Please ensure that you have added a new Animal ID or that the requested Kennel exists";
                    
                    ob_flush();

                    flush();
                    
                    usleep(2500000);
                    echo "<script>location.href = \"redirecting.php\"</script>";
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
