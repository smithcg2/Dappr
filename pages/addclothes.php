<?php

include('../../config.php');
include('../scripts/session.php');

function type_select($default_value='') {
  $select = '<select name="type">';
  $options = array('Shirt','Shorts','Pants','Jacket','Vest','Outerwear','Shoes','Socks','Underwear','Belt','Tie','Accessory','Other',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function style_select($default_value='') {
  $select = '<select name="style">';
  $options = array('Formal','Business','Classic','Casual','Work','Utilitarian','Swim','Comfort','Work Out','Other',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function color_select($default_value='') {
  $select = '<select name="color">';
  $options = array('Black','White','Gray','Brown','Beige','Red','Green','Blue','Navy','Yellow','Orange','Green','Purple','Pink','Other',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function fit_select($default_value='') {
  $select = '<select name="fit">';
  $options = array('Fitted','Slim','Regular','Classic',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function units_select($default_value='') {
  $select = '<select name="units">';
  $options = array('1','2','3','4','5','6','7','8','9','10+',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function rate_select($default_value="3") {
  $select = '<select name="rate">';
  $options = array('1','1.5','2','2.5','3','3.5','4','4.5','5');
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function weather_select($default_value='') {
  $select = '<select name="weather">';
  $options = array('Sunny/Warm','Sunny/Cool','Rain','Snow','Other',);
  foreach($options as $option) {
    $select .= write_option($option, $option, $default_value);
  }
  $select .= '</select>';
  return $select;  
}

function write_option($value, $display, $default_value='') {
  $option = '<option value="'.$value.'"';
  $option .= ($default_value == $value) ? ' SELECTED' : '';
  $option .= '>'.$display.'</option>';
  return $option;
}

                $type = $_POST['type'];
                $style = $_POST['style'];
                $color = $_POST['color'];
                $fit = $_POST['fit'];
                $name = $_POST['name'];
                $tags = $_POST['tags'];
		$weather = $_POST['weather'];
		$size = $_POST['size'];
		$size2 = $_POST['size2'];
		$units = $_POST['units'];
		$rate = $_POST['rate'];

/**
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
		$actual_name = $_FILES['file_upload']['name'];
		$original_name = $actual_name;
		$extension = $_FILES['file_upload']['extension'];

		$i = 1;
		while(file_exists('../uploads/'.$actual_name.".".$extension))
		{           
			    $actual_name = (string)$original_name.$i;
			        $name = $actual_name.".".$extension;
			        $i++;
		}
		$_FILES['file_upload']['name'] = $actual_name;
	}

	// Upload file
	if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], '../uploads' . $_FILES['file_upload']['name'])){
    		die('Error uploading file - check destination is writeable.');
	}

                $photo = $_FILES['file_upload']['name'].".".$_FILES['file_upload']['extension'];
	}
	else
	{
                $photo = "default.jpg";
	}

 */
                $photo = "default.png";

                if (isset($_POST['submit']))
                {
                
			$insertClothing = "INSERT INTO CLOTHING 
				   (`TYPE`, `STYLE`, `COLOR`, `FIT`, `NAME`, `TAGS`, `IMG`, `WEATHER`) 
				   VALUES('$type', '$style', '$color', '$fit', '$name', '$tags', '$photo', '$weather')";
			
			$ic = $db->query($insertClothing);
			$lastid = $db->insert_id;

			$userid = $_SESSION['userid'];
			$insert = "INSERT INTO CLOSET
				   (`USER_ID`,`CLOTHING_ID`,`SIZE`,`SIZE2`,`UNITS`,`RATE`)
				   VALUES ('$userid','$lastid','$size','$size2','$units','$rate');";
			
                if ($db->query($insert))
                {
                    header('location: addclothes.php');
                }
                else
                {
                    
                    echo "Error: " . $insert . "" . mysqli_error($db);
                    
                    ob_flush();

                    flush();
                    
                    usleep(5000000);
			header("location:javascript://history.go(-1)");
		}
                }
                else if (!isset($name))
                {
                    echo "Please enter a valid input.";
                }
                else
                {
                    echo "ERROR";
                }
                
                mysqli_close($db);

		include("../scripts/buildelems.php");
?>           


        <div id="wrapper"><center>
<div id="title">Fill up your closet!</div>
<form id="clothesform" action="" method="POST" enctype="multipart/form-data">
<p>
<label for="name">Name</label>
<input type="text" name="name" id="name" class="clothestext"></textarea>
</p>
<p>
<label for="type">Type</label>
	<?php echo type_select($type); ?>
</p>
<p>
<label for="style">Style</label>
	<?php echo style_select($style); ?>
</p>
<p>
<label for="color">Color</label>
	<?php echo color_select($color); ?>
</p>
<p>
<label for="fit">Fit</label>
	<?php echo fit_select($fit); ?>
</p>
<p>
<label for="size">Size</label>
<input type="text" name="size" id="size" class="clothestext"></textarea>
</p>
<p>
<label for="size2">Additional Size (Optional, could be pants inseam or additional information)</label>
<input type="text" name="size2" id="size2" class="clothestext"></textarea>
</p>
<p>
<label for="units">Units Owned</label>
	<?php echo units_select($units); ?>
</p>
<p>
<label for="rank">Rating</label>
	<?php echo rate_select($rate); ?>
</p>
<p>
<label for="weather">What type of weather would you wear this in?</label>
	<?php echo weather_select($weather); ?>
</p>
<p>
<label for="tags">Tags (optional. put each tag on a new line):</label>
	<textarea name="tags" id="tags" class="clothestextarea"></textarea>
</p>
<!--<p>
<label for="Photo">Photo:</label>
<input type="file" name="file_upload" id="file_upload">
</p>-->

<input type="submit" name="submit" value="Submit">
</form>
<a href="home.php"><button>Home</button></a></center>
            </div>
	</div>
	<?php include("../scripts/footer.php");?>
    </body>
</html>


