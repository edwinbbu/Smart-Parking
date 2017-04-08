<?php
require "init.php";

/*if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}*/
$response=array();
$sql="select slotid,status,vechileno from parkingslot;";
$result=mysqli_query($con,$sql);
if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
    }
    
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	if($row['status']==1)
		{
		$response['status'][]=array('slotid'=>$row['slotid']);
		}
	}

echo json_encode($response);	
mysqli_close($con);
?>
