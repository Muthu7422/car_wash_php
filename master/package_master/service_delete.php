<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_package_service_temp WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
$package_no=$_REQUEST['package_no'];
header("Location:package_master.php?package_no=$package_no");
?>