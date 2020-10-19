<?php
include("../../includes.php");
include("../../redirect.php");


$in="update m_sub_brand sub_brand='".$_POST['name']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_subbrand.php?msg=Data Saved Successfully!");
?>