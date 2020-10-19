<?php
include("../../includes.php");
include("../../redirect.php");



$Es="select * from user_role where role_name='".$_POST['role_name']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into user_role set role_name='".$_POST['role_name']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:user_role_view.php?s=Data Saved Sucessfully");
}
else
{
	header("location:user_role.php?a=Already Exits");
}
?>