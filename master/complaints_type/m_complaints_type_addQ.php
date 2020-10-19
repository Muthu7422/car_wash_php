<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from m_complaints_type where ctype='".$_POST['ctype']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_complaints_type set ctype='".$_POST['ctype']."',cdescription='".$_POST['cdescription']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_complaints_type.php?s=Save the data sucessfully");
}
else
{
	header("location:m_complaints_type.php?a=Already Exit");
}


?>