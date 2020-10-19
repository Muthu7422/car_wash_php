<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $emp="insert into h_relieving set ecode='".$_POST['ecode']."',ename='".$_POST['ename']."',designa='".$_POST['edesign']."',depart='".$_POST['edept']."',joindate='".$_POST['jdate']."',relive_date='".$_POST['rdate']."',experience='".$_POST['exper']."',status='Active',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$rpm=mysqli_query($conn,$emp);

 $ecode=$_POST['ecode'];
header("location:r_relievingletter_receipt.php?ecode=$ecode");

?>
