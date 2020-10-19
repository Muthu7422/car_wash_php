<?php
include("../../includes.php");
include("../../redirect.php");

$in="delete from coupon where Id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:coupon.php?msg=Data Deleted Successfully!");
?>