<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $in="update a_bank_acc set AccountNumber='".$_POST['AccountNumber']."',AccountName='".$_POST['AccountName']."',BankName='".$_POST['BankName']."',IFSCCode='".$_POST['IFSCCode']."',MICRCode='".$_POST['MICRCode']."',SwiftCode='".$_POST['SwiftCode']."',Branch='".$_POST['Branch']."',Amount='".$_POST['Amount']."',Status='".$_POST['Status']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',default_acc='".$_POST['default']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

$lgr="Update m_ledger set LedgerGroup='2',LedgerName='".strtoupper($_POST['BankName'])."',ContactNo='".$_POST['AccountNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where Id='".$_POST['LedgerId']."'";
$ledgrp=mysqli_query($conn,$lgr);

header("location:bank_account_view.php?s=Update Sucessfully");
?>