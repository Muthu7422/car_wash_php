<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_vehicle_brand set VehicleBrand='".$_POST['VehicleBrand']."',VehicleDescription='".$_POST['VehicleDescription']."',Status='".$_POST['Status']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_vehicle_brand.php?msg=1");
?>