<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_POST['VehicleBrand'];
	$name=explode("-",$id);
	$BrandName=trim($name[1]);

$sb="SELECT * FROM m_vehicle_brand where VehicleBrand='".trim($name[0])."'";
	$Esb=mysqli_query($conn,$sb);
	$nr=mysqli_num_rows($Esb);
if($nr>0)
{
$in="update master_vehicle set VehicleType='".$_POST['VehicleType']."',VehicleSegment='".$_POST['VehicleSegment']."',VehicleBrand='$BrandName',VehicleModel='".$_POST['VehicleModel']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_vehicle_master.php?msg=1");
}
else
{
header("location:m_vehicle_master.php?msg=2");

	}

?>