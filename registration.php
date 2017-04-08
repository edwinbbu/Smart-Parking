<?php
require "init.php";

if($_POST["key"]!="android")
{
	echo "No Permission to access this page!";
    exit();
}
$name=$_POST["name"];
$email=$_POST["email"];
$age=intval($_POST["age"]);
$username=$_POST["username"];
$password=$_POST["password"];

$s="insert into wallet values('$username',100);";
mysqli_query($con,$s);

$sql="insert into registration values('$name','$email','$age','$username','$password');";
$result=mysqli_query($con,$sql);
$status=array();
if(!$result)
{
	$status[status]="Invalid Username";
	echo json_encode($status);
}
else
{
	$status[status]="Registration Success";
	echo json_encode($status);

	ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "smartparking@smartparking";
    $to = $email;
    $subject = "Registration successfull";
    $message = "You have successfully registered.\nusername: $username\npassword: $password\nYour account has been credited with Rs100/-\nThank you for registering with Smart Parking.";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
}

mysqli_close($con);
?>