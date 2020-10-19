<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$Es="select * from reference_scheme where ReferenceId='".$_POST['ReferenceId']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  reference_scheme set ReferenceId='".$_POST['ReferenceId']."',ReferenceAmount='".$_POST['ReferenceAmount']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:referral_scheme_view.php?s=Date Save Sucessfully");
}
else
{
	header("location:referral_scheme.php?a=Already Exist");
}
?>