<?php
require "init.php";

date_default_timezone_set("Asia/Calcutta");

if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}
$username=$_POST["username"];
$slotid=$_POST["slot"];
$dat=$_POST["date"];
$stime=$_POST["time"];
$hours=intval($_POST["hours"]);

$cost=$hours*20;

$dat=date('Y-m-d',strtotime($dat));
$stime=date('H:i:s',strtotime($stime));
$h=$hours*60*60;

$etime=date('H:i:s',strtotime($stime)+$h);
$status=array();

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

$tstamp=date("Y-m-d H:i:s");
$transid=uniqid();

$sql="insert into bookingslot(transid,username,slotid,dat,stime,etime,hours,bookingtime) values('$transid','$username','$slotid','$dat','$stime','$etime','$hours','$tstamp');";
$result=mysqli_query($con,$sql);

if(!$result)
{
//	$status[status]="Error";
//	echo json_encode($status);
}
else
{
//	$status[status]="Booking successfull";
	$response=array();
	$sql2="select transid,username,slotid,dat,stime,hours,bookingtime from bookingslot where transid='$transid';";
	$result2=mysqli_query($con,$sql2);
	if(!$result2)
	{
		echo "Error";
	}
	else
	{
		while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC))
		{
			$response['status'][]=array('transid'=>$row['transid'],
										'username'=>$row['username'],
										'slotid'=>$row['slotid'], 
										'date'=>$row['dat'],
										'stime'=>$row['stime'],
										'hours'=>$row['hours'],
										'bookingtime'=>$row['bookingtime']);
		}
	}
	echo json_encode($response);
}


mysqli_close($con);
?>