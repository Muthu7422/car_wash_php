<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$inv_no=$_REQUEST['inv_no'];

$ca="update a_cash_acc set PurchaseAmount=PurchaseAmount + '".$_REQUEST['net']."',TotalAmount=TotalAmount + '".$_REQUEST['net']."' where pinv_no='".$inv_no."'";
$cas=mysqli_query($conn,$ca);		

$ca1="select * from a_cash_acc where pinv_no='".$inv_no."'";
$cas1=mysqli_query($conn,$ca1);
$casha1=mysqli_fetch_array($cas1);

if($casha1['PurchaseAmount']=='')
{
	$ca2="update a_cash_acc set TotalAmount='0' and status='Deactive' where pinv_no='".$inv_no."'";
    $cas2=mysqli_query($conn,$ca2);	
}
	
 $ct1="delete from s_purchase_details WHERE id='$id'";
$Ect1=mysqli_query($conn,$ct1);
header("Location: s_purchase_edit.php?inv_no=$inv_no");
?>