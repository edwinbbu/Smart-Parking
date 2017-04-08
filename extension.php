<?php
require "init.php";

if(!($_POST["transid"]))
{
	echo "No Permission to access this page!";
	exit(0);
}
$transid=$_POST["transid"];
$hours=intval($_POST["time_new"]);
$cost=$hours*20;

$sql="select username from bookingslot where transid='$transid';";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_row($result);
$username=$row[0];

$s="select balance from wallet where username='$username';";
$r=mysqli_query($con,$s);
$bal=mysqli_fetch_row($r);

if($bal[0]>=$cost)
{
	$sq="update wallet set balance=balance-'$cost' where username='$username';";
	mysqli_query($con,$sq);	
}
else
{
	$status[status]="Low Balance";
	echo json_encode($status);
	exit();
}

$sql="update bookingslot set hours=hours+'$hours' where transid='$transid';";
$result=mysqli_query($con,$sql);
if(!result)
{
	$response[status]="Error";
	echo json_encode($response);
}
else
{
	$response[status]="Successfull";
	echo json_encode($response);
}

mysqli_close($con);
?>