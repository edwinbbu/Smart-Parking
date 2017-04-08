<?php
require "init.php";
$status=array();
$username=$_POST['username'];
$sql="select name,email from registration where username='$username';";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['Status'][]=array('name'=>$row['name'], 
								'email'=>$row['email']
							);
	}


$sql="select vehicle_brand1,vehicle_name1 from vehicle where username='$username';";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$status['Status'][]=array('vehicle_na'=>$row['vehicle_brand1'], 
								'vechicle_no'=>$row['vehicle_name1']
							);
	}	
echo json_encode($status);
?>
