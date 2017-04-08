<?php
require "init.php";

$slotid=htmlspecialchars($_GET['slotid']);
$status=htmlspecialchars($_GET['status']);
$vechileno=htmlspecialchars($_GET['vechileno']);

//echo "SMART PARKING<br>";

$sql="update parkingslot set status='$status' where slotid='$slotid';";
mysqli_query($con,$sql);

$response=array();
$sql="select slotid,status from parkingslot;";
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$response[]=array($row['slotid']=>$row['status']);
}

echo json_encode($response);
mysqli_close($con);
?>