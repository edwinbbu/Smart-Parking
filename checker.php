<?php
require "init.php";

$transid=htmlspecialchars($_GET['checker']);
if(!$transid)
{
	$sql="select transid,username,slotid from qrcode order by tstamp desc limit 1;";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_row($result);
	$checker=$row[0];
	$username=$row[1];
	$slotid=$row[2];

	$response=array();
	$response['status'][]=array('checker'=>$checker,'username'=>$username,'slotid'=>$slotid);
	echo json_encode($response);	

}
$sql="update bookingslot set halfway='1' where transid='$transid';";
mysqli_query($con,$sql);

mysqli_close($con);

?>
