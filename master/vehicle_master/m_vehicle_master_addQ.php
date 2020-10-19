<?php
include("../../includes.php");
include("../../redirect.php");
$id=$_POST['VehicleBrand'];
	$name=explode("-",$id);
	$BrandName=trim($name[1]);
	

$Es="select * from master_vehicle where VehicleModel='".$_POST['VehicleModel']."' and Status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
	 $sb="SELECT * FROM m_vehicle_brand where VehicleBrand='".trim($name[0])."'";
	$Esb=mysqli_query($conn,$sb);
	$nr=mysqli_num_rows($Esb);
if($nr>0)
{	
$in="insert into  master_vehicle set VehicleType='".$_POST['VehicleType']."',VehicleSegment='".$_POST['VehicleSegment']."',VehicleBrand='$BrandName',VehicleModel='".$_POST['VehicleModel']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_vehicle_master.php?s=Date Save Sucessfully");
}
else
{
	header("location:m_vehicle_master.php?s=Invalid Brand! Please Create Brand from Brand Master");
}
}
else
{
	header("location:m_vehicle_master.php?a=Already Exiting");
}
?>