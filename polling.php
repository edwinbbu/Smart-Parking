<?php
require "init.php";

//$count=10;

$sql="select * from qrcode";
$result=mysqli_query($con,$sql);
$rows=mysqli_num_rows($result);
//echo $rows;

$response=array();

$sql2="select transid,username,slotid from qrcode order by tstamp desc limit 1;";
$result2=mysqli_query($con,$sql2);
if(!$result2)
{
	echo "\nError";
}
$row = mysqli_fetch_row($result2);

$response=array('count'=>$rows,'transid'=>$row[0],'username'=>$row[1],'slotid'=>$row[2] 							
							);	
echo json_encode($response); 
mysqli_close($con);
?>