<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_brand set brand='".$_POST['brand']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_brand.php?msg=Data Saved Successfully!");
?>