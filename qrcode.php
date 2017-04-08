<?php
require "init.php";

date_default_timezone_set("Asia/Calcutta");

if(!$_POST["data"])
{
	echo "No Permission to access this page!";
    exit();
}

$d=array();
$data=$_POST["data"];
//echo $data;
$d=explode(" ",$data);

foreach($d as $key=>$values)
{
	//echo "$key:$values\n";
	switch($key)
	{
		case 0: $username=$values;
				break;
		case 1: $transid=$values;
				break;
		case 2: $slotid=$values;
				break;
		case 3: $dat=$values;
				break;
		case 4: $tim=$values;
				break;
	}
	
}

$dat=date('Y-m-d',strtotime($dat));
$tim=date('H:i:s',strtotime($tim));
$tstamp=date("Y-m-d H:i:s");

$sql2="select transid from bookingslot where transid='$transid' and entry=0;";
$result2=mysqli_query($con,$sql2);
if(!$result2)
{
	echo "\nError";
}
else
{
	$row=mysqli_fetch_row($result2);
	if(is_null($row[0]))
	{
		echo "\nQR code already used!";
		mysqli_close($con);
		exit();
	}
	
	$sql3="update bookingslot set entry=1 where transid='$transid';";
	mysqli_query($con,$sql3);

	$sql="insert into qrcode(transid,username,slotid,dat,tim,tstamp) values('$transid','$username','$slotid','$dat','$tim','$tstamp')";
	$result=mysqli_query($con,$sql);

	if(!$result)
	{
		echo "\nError";
	}
	else
	{
		echo "\nSuccessfull";
	}
}

mysqli_close($con);
?>