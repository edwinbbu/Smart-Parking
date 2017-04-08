<?php
require "init.php";

$slotid=htmlspecialchars($_GET['slotid']);
$status=htmlspecialchars($_GET['status']);
$vechileno=htmlspecialchars($_GET['vechileno']);

//echo "SMART PARKING<br>";

$sql="update parkingslot set status='$status' where slotid='$slotid';";
mysqli_query($con,$sql);

$response=array();
$sql="select slotid,status from parkingslot where slotid='A1';";
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$response=array('slotid'=>$row['slotid'],'status'=>$row['status']);
}

echo json_encode($response);
mysqli_close($con);
?>