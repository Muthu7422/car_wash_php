<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$Es="select * from expense_master where ExpenseType='".$_POST['ExpenseType']."' and LedgerType='".$_POST['LedgerType']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  expense_master set ExpenseType='".$_POST['ExpenseType']."',ecategory='".$_POST['ecategory']."',LedgerType='".$_POST['LedgerType']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',Status='Active'"; 
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);


 $li="insert into m_ledger set LedgerGroup='".$_POST['LedgerType']."',LedgerName='".$_POST['ExpenseType']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',ContactNo='".$_SESSION['FranchiseeCode']."'";
$Eli=mysqli_query($conn,$li);
$eid=mysqli_insert_id($conn);

$ut="update expense_master set LedgerId='$eid' where Id='$id'";
$Eut=mysqli_query($conn,$ut);

//$_SESSION['FranchiseeCode'];

header("location:a_expense_type_view.php?s=Date Save Sucessfully");
}
else
{
	header("location:a_expense_type.php?a=Already Exiting");
}
?>