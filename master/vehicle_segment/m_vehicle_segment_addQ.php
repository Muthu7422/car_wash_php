<?php
include("../../includes.php");
include("../../redirect.php");

$Es="select * from master_vehicle_segment where VehicleSegment='".$_POST['VehicleSegment']."' and Status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  master_vehicle_segment set VehicleSegment='".$_POST['VehicleSegment']."',Status='Active'";
$Ein=mysqli_query($conn,$in); 
header("location:m_vehicle_segment.php?s=Data Saved Successfully!");
}
else
{
header("location:m_vehicle_segment.php?a=Data Already Exist");	
}
?>