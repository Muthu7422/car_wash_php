<?php
include("../../includes.php");
include("../../redirect.php");

$in="update m_painters_master set PainterName='".$_POST['PainterName']."',PainterMobile='".$_POST['PainterMobile']."',PainterSecondaryMobile='".$_POST['PainterSecondaryMobile']."',PainterAddress='".$_POST['PainterAddress']."',PainterCity='".$_POST['PainterCity']."',Painterstate='".$_POST['Painterstate']."',PainterEmail='".$_POST['PainterEmail']."',sbrand='".$_POST['sbrand']."',sdescription='".$_POST['sdescription']."',GstNo='".$_POST['GstNo']."',opening_balance='".$_POST['opening_balance']."',status='".$_POST['status']."',ledger_group='".$_POST['ledger_group']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in); 

$lgr="Update m_ledger set LedgerGroup='23',LedgerName='".$_POST['PainterName']."',ContactNo='".$_POST['PainterMobile']."' where Id='".$_POST['LedgerId']."'";
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

$io="INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['sname']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '$ttlos', '".$_POST['opening_balance']."', '0', 'cash');";
$Eio=mysqli_query($conn,$io);
 
 
//$io="INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['sname']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '0', '".$_POST['opening_balance']."', '0', 'cash');";
//$Eio=mysqli_query($io);


header("location:m_painter.php?s=Update Sucessfully");
?>