<?php
require "init.php";


if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}
$username=$_POST["username"];
$amount=intval($_POST["amount"]);

$sql="update wallet set balance=balance+'$amount' where username='$username';";
mysqli_query($con,$sql);
require "balance.php";
mysqli_close($con);
?>