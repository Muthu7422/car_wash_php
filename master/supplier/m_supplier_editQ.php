<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


 $in="update m_supplier set sname='".$_POST['sname']."',shipping_name='".$_POST['shipping_name']."',smobile1='".$_POST['smobile1']."',shipping_mobile1='".$_POST['shipping_mobile1']."',smobile2='".$_POST['smobile2']."',shipping_mobile2='".$_POST['shipping_mobile2']."',saddress='".$_POST['saddress']."',shipping_address='".$_POST['shipping_address']."',scity='".$_POST['scity']."',shipping_city='".$_POST['shipping_city']."',sstate='".$_POST['sstate']."',shipping_state='".$_POST['shipping_state']."',semail='".$_POST['semail']."',shipping_email='".$_POST['shipping_email']."',sbrand='".$_POST['sbrand']."',sdescription='".$_POST['sdescription']."',opening_balance='".$_POST['opening_balance']."',status='".$_POST['status']."',GstNo='".$_POST['GstNo']."',ledger_group='".$_POST['ledger_group']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where sid='".$_POST['sid']."'";
$Ein=mysqli_query($conn,$in);

 $lgr="Update m_ledger set LedgerGroup='23',LedgerName='".$_POST['sname']."',ContactNo='".$_POST['smobile1']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where Id='".$_POST['LedgerId']."'";
$ledgrp=mysqli_query($conn,$lgr); 
 
 $sto="select total_outstanding from sup_outstanding where cust_name='".strtoupper($_POST['sname'])."' order by id desc";
$Esto=mysqli_query($conn,$sto);
$nr=mysqli_num_rows($Esto);
if($nr>'0')
{
	$FEsto=mysqli_fetch_array($Esto);
	$ttlos=$FEsto['total_outstanding'];
}
else
{
	$ttlos=0;
}

$io="INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`, `franchisee_id`, `vendor_id`) VALUES (NULL, '".$_POST['sname']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '$ttlos', '".$_POST['opening_balance']."', '0', 'cash', ''".$var['branch_id']."'', ''".$var1['vendor_id']."'');";
$Eio=mysqli_query($conn,$io);
 
 
//$io="INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['sname']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '0', '".$_POST['opening_balance']."', '0', 'cash');";
//$Eio=mysqli_query($io);


header("location:m_supplier_view.php?s=Update Sucessfully");
?>