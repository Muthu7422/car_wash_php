<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$cs="select * from membership where MemberShip='".$_POST['MemberShipName']."'";
$Ecs=mysqli_query($conn,$cs);
$nr=mysqli_num_rows($Ecs);
if($nr<'1')
{
 $in="insert into  membership set MemberShip='".$_POST['MemberShipName']."',Description='".$_POST['MemberShipDescription']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Ein=mysqli_query($conn,$in);
header("location:membership_view.php?s=Data Saved Successfully!");
}
else
{
header("location:membership.php?a=Data Already Exist");	
}

?>