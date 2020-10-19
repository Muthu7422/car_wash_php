<?php
include("../../includes.php");
include("../../redirect.php");

$sa="select * from m_package where Id='".$_POST['PackageId']."'";
$Esa=mysqli_query($conn,$sa);
$FEsa=mysqli_fetch_array($Esa);
$rvno=strtoupper(str_replace(" ","",$_POST['vehicle']));
$som="insert into s_add_package set PackageId='".$_POST['PackageId']."',VehicleId='$rvno',StartDate='".$_POST['StartDate']."',EndDate='".$_POST['EndDate']."',AvailableAmount='".$FEsa['amount']."',Status='Active'"; 
$soms=mysqli_query($conn,$som); 
$pcm=mysqli_insert_id($conn,);

header("location:package_add.php?m=Package Added Successfully !");
?>