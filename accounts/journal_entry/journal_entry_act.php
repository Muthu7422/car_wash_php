<?php
include("../../includes.php");

$in="insert into journal_entry set journal_entry_no='".$_POST['journal_entry_no']."',date='".$_POST['date']."',journal_by='".$_POST['journal_by']."',journal_to='".$_POST['journal_to']."',amount='".$_POST['amount']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Ein=mysqli_query($conn,$in);
	  
 header("location:journal_entry.php");
?>