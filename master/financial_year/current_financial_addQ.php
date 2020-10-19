<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);



$Es="select * from financial_year where fyear='".$_POST['financial_year']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
 $in="update financial_year set fyear='".$_POST['financial_year']."',userid='".$_POST['franchisee_id']."',sdescription='".$_POST['sdescription']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:current_financial.php?s=Date Save Sucessfully");
}
else
{
	header("location:current_financial.php?a=Already Exiting");
}
?>