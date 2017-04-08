<?php
require "init.php";

if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}
$username=$_POST["username"];
$password=$_POST["password"];
$status=array();

$sql="select username,passwd from registration where username='$username';";
$result=mysqli_query($con,$sql);
if(!$result)
	    {
	        die("Error in connection " . mysqli_connect_error());
	    }
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$user=$row['username'];
	$pass=$row['passwd'];
}

if($username==$user && $password==$pass)
{
	$status[status]="success";
}
else
{
	$status[status]="error";
}
echo json_encode($status);
mysqli_close($con);
?>