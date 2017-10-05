
<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "svendeprove";

   $dbcon = mysqli_connect($host, $user, $password, $database);
	 mysqli_query($dbcon, "SET NAMES utf8");
 ?>
