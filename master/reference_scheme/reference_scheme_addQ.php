<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from reference_scheme where ReferenceId='".$_POST['ReferenceId']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  reference_scheme set ReferenceId='".$_POST['ReferenceId']."',ReferenceAmount='".$_POST['ReferenceAmount']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:reference_scheme.php?s=Date Save Sucessfully");
}
else
{
	header("location:reference_scheme.php?a=Already Exist");
}
?>