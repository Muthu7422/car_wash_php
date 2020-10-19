<?php
include("../../includes.php");
include("../../redirect.php");

  $in="update a_petty_type set PettyType='".$_POST['PettyType']."',LedgerType='".$_POST['LedgerType']."',status='".$_POST['status']."',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);

 // $li="update m_ledger set LedgerGroup='".$_POST['LedgerType']."',LedgerName='".$_POST['ExpenseType']."',ContactNo='".$_SESSION['FranchiseeCode']."' where Id='".$_POST['LedgerId']."'";
// $Eli=mysqli_query($conn,$li);


header("location:a_petty_type.php?msg=1");
?>