<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_package_service WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
$package_no=$_REQUEST['package_no'];
header("Location:package_master_edit.php?package_no=$package_no");
?>