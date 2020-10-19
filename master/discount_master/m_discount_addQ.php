<?php
include("../../includes.php");
include("../../redirect.php");



 $in="update m_discount set d_name='".$_POST['d_name']."',d_percentage='".$_POST['d_percentage']."',s_time='".$_POST['s_time']."',e_time='".$_POST['e_time']."',status='Active'";
$Ein=mysqli_query($conn,$in);


header("location:m_discount.php?s=Data Saved Sucessfully");


?>