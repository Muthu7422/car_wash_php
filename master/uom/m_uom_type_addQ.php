<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from m_unit_master where u_name='".$_POST['UnitType']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_unit_master set u_name='".$_POST['UnitType']."',u_description='".$_POST['UnitDescription']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_uom_view.php?s=Date Save Sucessfully");
}
else
{
	header("location:m_uom_type.php?a=Already Exiting");
}
?>