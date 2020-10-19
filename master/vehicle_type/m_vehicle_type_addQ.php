<?php
include("../../includes.php");
include("../../redirect.php");

$Es="select * from m_vehicle_type where m_vehicle_type='".$_POST['VehicleType']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_vehicle_type set VehicleType='".$_POST['VehicleType']."',VehicleDescription='".$_POST['VehicleDescription']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_vehicle_type.php?s=Data Saved Successfully!");
}
else
{
header("location:m_vehicle_type.php?a=Data Already Exist");	
}
?>