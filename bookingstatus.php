<?php
require "init.php";
if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}

$dat=$_POST["date"];
//echo "d:".$dat;
$stime=$_POST["time"];
//echo "s".$stime;
$hours=intval($_POST["hours"]);
$h=$hours*60*60;

$dat=date('Y-m-d',strtotime($dat));
//echo "date:$dat";
$stime=date('H:i:s',strtotime($stime));

//echo "startime:".$stime;
$etime=date('H:i:s',strtotime($stime)+$h);
//echo "endtime:".$etime;
$status=array();

$sql="select slotid,stime,etime from bookingslot where dat='$dat' and '$stime'>=stime and '$stime'<=etime;";
$result=mysqli_query($con,$sql);
if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
      
    }
    
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['status'][]=array('slotid'=>$row['slotid'], 
								'stime'=>$row['stime'],
								'etime'=>$row['etime']);
	}
$sql="select slotid,stime,etime from bookingslot where dat='$dat' and '$etime'>=stime and '$etime'<=etime;";
$result=mysqli_query($con,$sql);
if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
      
    }
    
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['status'][]=array('slotid'=>$row['slotid'], 
								'stime'=>$row['stime'],
								'etime'=>$row['etime']);
	}
$sql="select slotid,stime,etime from bookingslot where dat='$dat' and '$stime'>=stime and '$etime'<=etime;";
$result=mysqli_query($con,$sql);
if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
      
    }
    
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['status'][]=array('slotid'=>$row['slotid'], 
								'stime'=>$row['stime'],
								'etime'=>$row['etime']);
	}
$sql="select slotid,stime,etime from bookingslot where dat='$dat' and stime>='$stime' and etime<='$etime';";
$result=mysqli_query($con,$sql);
if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
      
    }
    
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['status'][]=array('slotid'=>$row['slotid'], 
								'stime'=>$row['stime'],
								'etime'=>$row['etime']);
	}
	echo json_encode($status);
	mysqli_close($con);
?>