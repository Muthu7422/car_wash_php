<?php
include("../../includes.php");
include("../../redirect.php");
$in="update master_vehicle_segment set VehicleSegment='".$_POST['VehicleSegment']."',Status='".$_POST['Status']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_vehicle_segment.php?msg=1");
?>