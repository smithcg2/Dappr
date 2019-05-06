<?php
	include("../../config.php");
	include("../../session.php");
	session_start();

	$clothingid = $_REQUEST['id'];	
	$row = mysqli_fetch_row($db->query("SELECT * FROM CLOTHING WHERE CLOTHING_ID = ".$clothingid));

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


$name = $row[5];
$type = $row[1];
$style = $row[2];
$color = $row[3];
$fit = $row[4];
$img = $row[7];
$weather = $row[8];

	if (isset($_POST['update'])) {
		$sql = "UPDATE CLOTHING SET TYPE='".$_POST['type']."', STYLE='".$_POST['style']."', COLOR='".$_POST['color']."', FIT='".$_POST['fit']."', NAME='".$_POST['name']."', WEATHER='".$_POST['weather']."' WHERE CLOTHING_ID = ".$clothingid."";
		$db->query($sql);
		header('location: closet.php');
		exit;
		}
	
?>


<!doctype html>
<html>
<head>
	<title>Dappr</title>
	<meta name = "viewport" content="width=device-width, maximum-scale=1.5">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<link rel="stylesheet" type="text/css" href="../style/responsive.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135138799-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135138799-1');
</script>
</head>	
	<body>

<div id="nav">
<a href="../pages/home.php">
<img id="homelogo" src="../images/logo_only.png" alt="logo">
<img id="homelogotext" src="../images/logo_textonly.png" alt="Dappr">
</a>
</div>
<div id="wrapper">
<div class="container">
    <h1>Edit Clothing</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
        <form class="form-horizontal" method="POST">
      <div class="col-md-3">
        <div class="text-center">
	  <img src="../uploads/<?php echo $img ?>" style="max-width: 200px; max-height: 200px;"class="avatar" alt="avatar">
	<!--  
	<h6>Upload a different photo...</h6>
          <input name="file_upload" type="file" class="form-control">
          -->
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Details</h3>
        
          <div class="form-group">
            <label class="col-md-3 control-label">Name:</label>
            <div class="col-md-8">
              <input class="form-control" name="name" type="text" value="<?php echo $name ?>">
            </div>
	  </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Type:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
			<?php echo type_select($type); ?>
		</div>
	    </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Style:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
			<?php echo style_select($style); ?>
		</div>
	    </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Color:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
	    		<?php echo color_select($color); ?>
		</div>
	    </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Fit:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
	    		<?php echo fit_select($fit); ?>
		</div>
	    </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Size:</label>
            <div class="col-lg-8">
              <input class="form-control" name="size" type="text" value="<?php echo $size ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Additional Size:</label>
            <div class="col-lg-8">
	      <input class="form-control" name="size2" type="text" value="<?php echo $size2?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Units:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
	    		<?php echo units_select($units); ?>
		</div>
	    </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Weather:</label>
	    <div class="col-lg-8">
		<div class="ui-select">
	    		<?php echo weather_select($weather); ?>
		</div>
	    </div>
          </div>
	  

	    <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes" name="update">
              <span></span>
	      <a href="home.php"><input type="button" class="btn btn-default" value="Cancel"></a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

</body>
</html>
