<?php
include("../../includes.php");
include("../../redirect.php");


$ledger="select * from m_ledger where LedgerGroup='23' and LedgerName='".$_POST['sname']."' and ContactNo='".$_POST['smobile1']."'";
$ledgerq=mysqli_query($conn,$ledger);
$ledgergrp=mysqli_fetch_array($ledgerq);
$ln=mysqli_num_rows($ledgerq);

if($ln<'1')
{
 $Es="select * from m_painters_master where PainterName='".$_POST['PainterName']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into  m_painters_master set PainterName='".$_POST['PainterName']."',PainterMobile='".$_POST['PainterMobile']."',PainterSecondaryMobile='".$_POST['PainterSecondaryMobile']."',PainterAddress='".$_POST['PainterAddress']."',PainterCity='".$_POST['PainterCity']."',Painterstate='".$_POST['Painterstate']."',PainterEmail='".$_POST['PainterEmail']."',sbrand='".$_POST['sbrand']."',sdescription='".$_POST['sdescription']."',GstNo='".$_POST['GstNo']."',opening_balance='".$_POST['opening_balance']."',status='Active',ledger_group='".$_POST['ledger_group']."'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);

$lgr="insert into m_ledger set LedgerGroup='23',LedgerName='".$_POST['PainterName']."',ContactNo='".$_POST['PainterMobile']."'";
$ledgrp=mysqli_query($conn,$lgr);
$LedgerId=mysqli_insert_id($conn);		

$cu="update m_painters_master set LedgerId='$LedgerId' where Id='$id'";
$custup=mysqli_query($conn,$cu);

$sto="select total_outstanding from sup_outstanding where cust_name='".strtoupper($_POST['PainterName'])."' order by id desc";
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


// $io="INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['sname']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '0', '".$_POST['opening_balance']."', '0', 'cash');";
//$Eio=mysqli_query($io);


header("location:m_painter.php?s=Painter Saved the Sucessfully");
}
else
{
header("location:m_painter.php?a=Painter Already Exits");	
}
}

else
{
header("location:m_painter.php?a=1");
}
?>