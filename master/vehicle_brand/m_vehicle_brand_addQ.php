<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from m_vehicle_brand where VehicleBrand='".$_POST['VehicleBrand']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_vehicle_brand set VehicleBrand='".$_POST['VehicleBrand']."',VehicleDescription='".$_POST['VehicleDescription']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_vehicle_brand.php?s=Date Save Sucessfully");
}
else
{
	header("location:m_vehicle_brand.php?a=Already Exiting");
}
?>