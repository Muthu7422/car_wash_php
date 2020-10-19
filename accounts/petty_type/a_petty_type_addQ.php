<?php
include("../../includes.php");
include("../../redirect.php");



$Es="select * from a_petty_type where PettyType='".$_POST['PettyType']."' and LedgerType='".$_POST['LedgerType']."' and status='Active' and franchisee_id='".$_SESSION['BranchId']."'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  a_petty_type set PettyType='".$_POST['PettyType']."',LedgerType='".$_POST['LedgerType']."',status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'"; 
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);


echo  $li="insert into m_ledger set LedgerGroup='".$_POST['LedgerType']."',LedgerName='".$_POST['PettyType']."',ContactNo='F1',ledid='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eli=mysqli_query($conn,$li); 
$eid=mysqli_insert_id();





// $ut="update expense_master set LedgerId='$eid' where Id='$id'";
// $Eut=mysqli_query($conn,$ut);

//$_SESSION['FranchiseeCode'];

header("location:a_petty_type.php?s=Date Save Sucessfully");
}
else
{
header("location:a_petty_type.php?a=Already Exiting");
}
?>