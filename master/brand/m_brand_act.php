<?php
include("../../includes.php");
include("../../redirect.php");
$cs="select * from m_brand where brand='".$_POST['brand']."'";
$Ecs=mysqli_query($conn,$cs);
 $nr=mysqli_num_rows($Ecs);
if($nr<'1')
{
$in="insert into  m_brand set brand='".$_POST['brand']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_brand.php?msg=Data Saved Successfully!");
}
else
{
header("location:m_brand.php?msg=Data Already Exist");	
}
?>