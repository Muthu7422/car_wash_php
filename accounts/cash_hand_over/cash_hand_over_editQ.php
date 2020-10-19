<?php
include("../../includes.php");
include("../../redirect.php");

// $se="select * from a_petty_cash where id='".$_REQUEST['id']."'";
// $Ese=mysqli_query($conn,$se);
// $FEse=mysqli_fetch_array($Ese);

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$ica="update a_hand_over_cash set CDate='".$_POST['CDate']."',camount='".$_POST['camount']."',Description='".$_POST['Description']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_REQUEST['cid']."'";
$Eica=mysqli_query($conn,$ica);

header("location:cash_hand_over.php?msg=updated  Successfully");
?>