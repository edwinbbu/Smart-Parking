<?php
require "init.php";

if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}

$username=$_POST['username'];
$status=array();
$sql="select balance from wallet where username='$username';";
$result=mysqli_query($con,$sql);
$balance=mysqli_fetch_row($result);
//$balance=obj->balance;
$status[status]=$balance[0];
echo json_encode($status);
mysqli_close($con);
?>