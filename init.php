<?php
$host = "mysql.hostinger.in";
$user = "u894942780_user";
$password="smartparking";
$db = "u894942780_db";

$con = mysqli_connect($host,$user,$password,$db);

if(!$con)
{
	die("Error in connection " . mysqli_connect_error());
}

?>