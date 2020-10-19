<?php
include("../../includes.php");
include("../../redirect.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $in="insert into a_cash_acc set cdate='".$_POST['cdate']."',cash='".$_POST['cash']."',ledger='".$_POST['ledger']."',StartedOpening='".$_POST['cash']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:a_cash_acc_view.php?s=Data Save Sucessfully");
