<?php
require "init.php";

if(!($_POST["transid"]))
{
	echo "No Permission to access this page!";
	exit(0);
}
$transid=$_POST["transid"];
echo $transid;

$sql="select username,hours from bookingslot where transid='$transid' and entry=0;";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_row($result);
$username=$row[0];
if(is_null($username))
	{
		echo "\nYour booking is already issued!";
		mysqli_close($con);
		exit();
	}
$hours=$row[1];
echo $username;

$cost=$hours*10;

$sql="delete from bookingslot where transid='$transid';";
$r=mysqli_query($con,$sql);

$sq="update wallet set balance=balance+'$cost' where username='$username';";
mysqli_query($con,$sq);

echo "Successfull";
mysqli_close($con);

?>