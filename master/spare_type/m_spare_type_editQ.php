<?php
include("../../includes.php");
include("../../redirect.php");

 $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


$in="update m_spare_type set stype='".$_POST['stype']."',sdescription='".$_POST['sdescription']."',status='".$_POST['status']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where sid='".$_POST['sid']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_spare_type_view.php?msg=1");
?>