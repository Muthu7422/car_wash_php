<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_vehicle_type set VehicleType='".$_POST['VehicleType']."',VehicleDescription='".$_POST['VehicleDescription']."',Status='".$_POST['Status']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_vehicle_type.php?msg=1");
?>