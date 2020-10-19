<?php
include("../../includes.php");
include("../../redirect.php");

	$spm1="select *from s_spare_prepick_details where id='".$_REQUEST['id']."'";
	$dcm1=mysqli_query($conn,$spm1);
	$jb1=mysqli_fetch_array($dcm1);
	
$echecks="Update item_stock set StockQuantity=StockQuantity+'".$jb1['qty']."' where ItemId='".$jb1['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$echks=mysqli_query($conn,$echecks);

$ct="delete from s_spare_prepick_details where id='".$_REQUEST['id']."'";
$Ect=mysqli_query($conn,$ct);

$job_card_no=$_REQUEST['job_card_no'];
$JobcardId=$_REQUEST['JobcardId'];
header("location:s_spare_prepick_edit.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
?>