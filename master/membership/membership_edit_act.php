<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $in="update membership set status='".$_POST['status']."',MemberShip='".$_POST['MemberShipName']."',Description='".$_POST['MemberShipDescription']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:membership_view.php?d=1");
?>