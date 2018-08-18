<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "yourPassword";
	$dbName = "formlogin";

$connection = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if($connection == false){
die('Connection problem:'. mysql_error());
}

?>
