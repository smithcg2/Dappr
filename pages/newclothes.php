<?php 
include("../../config.php");

header("location: updateclothes.php?id=".(mysqli_fetch_row($db->query("INSERT INTO `CLOTHING` (`IMG`) VALUES ('Default'); SELECT LAST_INSERT_ID();"))[0]));

?>
