<?php
include("../../includes.php");
include("../../redirect.php");

 $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$Es="select * from m_spare_type where stype='".$_POST['stype']."' and status='Active' and franchisee_id='".$var['branch_id']."' and vendor_id='".$var1['vendor_id']."' "; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into m_spare_type set stype='".$_POST['stype']."',sdescription='".$_POST['sdescription']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_spare_type_view.php?s=Date Save Sucessfully");
}
else
{
	header("location:m_spare_type_view.php?a=Already Exiting");
}
?>