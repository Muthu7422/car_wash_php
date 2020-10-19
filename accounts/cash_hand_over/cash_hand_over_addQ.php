<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$in="insert into a_hand_over_cash set CDate='".$_POST['CDate']."',CBranch='".$_POST['CBranchid']."',camount='".$_POST['camount']."',Description='".$_POST['Description']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);


header("location:cash_hand_over.php?msg=Data Saved Sucessfully!");

?>