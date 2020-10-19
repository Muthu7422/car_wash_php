<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from m_payment_mode where PaymentMode='".$_POST['PaymentMode']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_payment_mode set PaymentMode='".$_POST['PaymentMode']."',PaymentDescription='".$_POST['PaymentDescription']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_payment_mode.php?s=Date Save Sucessfully");
}
else
{
	header("location:m_payment_mode.php?a=Already Exiting");
}
?>