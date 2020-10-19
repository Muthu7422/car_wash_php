<?php
include("../../includes.php");
include("../../redirect.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$ledger="select * from m_ledger where LedgerGroup='2' and LedgerName='".$_POST['BankName']."' and ContactNo='".$_POST['AccountNumber']."'";
$ledgerq=mysqli_query($conn,$ledger);
$ledgergrp=mysqli_fetch_array($ledgerq);
$ln=mysqli_num_rows($ledgerq);

if($ln<'1')
{

 $Es="select * from a_bank_acc where AccountNumber='".$_POST['AccountNumber']."' and IFSCCode='".$_POST['IFSCCode']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
 $in="insert into  a_bank_acc set AccountNumber='".$_POST['AccountNumber']."',AccountName='".$_POST['AccountName']."',BankName='".$_POST['BankName']."',IFSCCode='".$_POST['IFSCCode']."',MICRCode='".$_POST['MICRCode']."',SwiftCode='".$_POST['SwiftCode']."',Branch='".$_POST['Branch']."',Amount='".$_POST['Amount']."',status='Active',LedgerGroup='".$_POST['ledger_group']."',default_acc='".$_POST['default']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$Ein=mysqli_query($conn,$in); 
$id=mysqli_insert_id($conn);

$lgr="insert into m_ledger set LedgerGroup='2',LedgerName='".$_POST['BankName']."',ContactNo='".$_POST['AccountNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$ledgrp=mysqli_query($conn,$lgr);
$LedgerId=mysqli_insert_id($conn);	

$cu="update a_bank_acc set LedgerId='$LedgerId' where Id='$id'";
$custup=mysqli_query($conn,$cu);

header("location:bank_account_view.php?s=Customer Saved the Sucessfully");
}
else
{
header("location:bank_account_view.php?a=Customer Already Exist");	
}
}
else
{
header("location:bank_account_view.php?a=Customer Already Exist");		
}
?>