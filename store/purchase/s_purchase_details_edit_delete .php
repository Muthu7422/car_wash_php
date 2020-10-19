<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];
$pm1="select * from s_purchase_details where id='".$id."'";
$Epm1=mysqli_query($conn,$pm1);
$Fpm1=mysqli_fetch_array($conn,$Epm1);
$inv_no=$Fpm1['inv_no'];
header("location:s_purchase_edit.php?inv_no=$inv_no");
?>