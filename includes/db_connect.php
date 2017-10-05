
<?php

	$host = "localhost";
	$user = "root";
	$password = "1234";
	$database = "svendeprove";

   $dbcon = mysqli_connect($host, $user, $password, $database);
	 mysqli_query($dbcon, "SET NAMES utf8");

 ?>
