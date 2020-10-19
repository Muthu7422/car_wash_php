<?php
include("../../includes.php");
include("../../redirect.php");

$cs="select * from m_sub_brand where brand='".$_POST['brand']."' AND sub_brand='".$_POST['sub_brand']."'";
$Ecs=mysqli_query($conn,$cs);
 $nr=mysqli_num_rows($Ecs);
if($nr<'1')
{
$in="insert into  m_sub_brand set brand='".$_POST['brand']."',sub_brand='".$_POST['sub_brand']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_subbrand.php?msg=Data Saved Successfully!");
}
else
{
header("location:m_subbrand.php?msg=Data Already Exist");	
}
?>