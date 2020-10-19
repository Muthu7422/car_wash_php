<?php
include("../../includes.php");
include("../../redirect.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$in="update expense_master set ExpenseType='".$_POST['ExpenseType']."',LedgerType='".$_POST['LedgerType']."',ecategory='".$_POST['ecategory']."',Status='".$_POST['Status']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

 $li="update m_ledger set LedgerGroup='".$_POST['LedgerType']."',LedgerName='".$_POST['ExpenseType']."',ContactNo='".$_SESSION['FranchiseeCode']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where Id='".$_POST['LedgerId']."'";
$Eli=mysqli_query($conn,$li);


header("location:a_expense_type_view.php?msg=1");
?>