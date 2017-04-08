<?php
require "init.php";

if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}
$username=$_POST["username"];
$v1b=$_POST["v1b"];
$v1r=$_POST["v1r"];
$v2b=$_POST["v2b"];
$v2r=$_POST["v2r"];

$sql="insert into vehicle values('$username','$v1b','$v1r','$v2b','$v2r');";
$result=mysqli_query($con,$sql);
$status=array();
if(!$result)
{
	$status[status]="Invalid Username";
}
else
{
	$status[status]="Vechile Details Recieved";
}
mysqli_close($con);
echo json_encode($status);
?>
