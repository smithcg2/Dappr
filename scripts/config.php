<?php
	define('DB_SERVER','localhost');
	define('DB_USERNAME','root');
	define('DB_PASSWORD','Smithcg4792');
	define('DB_DATABASE','Dappr');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ('Error connecting to database');

error_reporting(E_ERROR);
?>