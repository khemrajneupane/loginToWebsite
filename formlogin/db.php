<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "khem1";
	$dbName = "formlogin";

$connection = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if($connection == false){
die('Connection problem:'. mysql_error());
}

?>