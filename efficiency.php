<?php
require "init.php";

echo "Efficiency of the total system<br><br>";
$sql="select * from bookingslot;";
$result=mysqli_query($con,$sql);
$requests=mysqli_num_rows($result);
echo "Number of requests:".$requests."<br>";

$sql="select * from bookingslot where halfway=1;";
$result=mysqli_query($con,$sql);
$success=mysqli_num_rows($result);
echo "Number of requests successfully served:".$success."<br>";

$eff=($success*100)/$requests;
$eff=number_format($eff,2);
echo "Efficiency=".$eff."<br><br><br>";

echo "Slot occupancy rate<br><br>";
$sql="select * from parkingslot;";
$result=mysqli_query($con,$sql);
$slots=mysqli_num_rows($result);
echo"Number of slots :".$slots."<br>";

$sql="select * from parkingslot where status=1";
$result=mysqli_query($con,$sql);
$occupied=mysqli_num_rows($result);
echo"Number of slots occupied:".$occupied."<br>";

$eff2=($occupied*100)/$slots;
echo "slot occupancy rate:".$eff2;



mysqli_close($con);
?>