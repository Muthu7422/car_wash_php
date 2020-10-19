<?php
include("../../includes.php");
include("../../redirect.php");

if($_POST['payment_mode']=="Cash")
{
 $cash_acc="insert into account_cash set TransactionDate='".$_POST['PaidDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['PaidAmount']."',ReferenceNo='".$_POST['InvoiceNo']."',TransactionFrom='painter_outstanding',Remarks='Painter Voucher',LedgerId='".$_POST['PLI']."'"; 
$acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if($_POST['payment_mode']!='Cash')
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['PaidDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['PaidAmount']."',ReferenceNo='".$_POST['InvoiceNo']."',TransactionFrom='painter_outstanding',Remarks='Painter Voucher',BankId='".$_POST['BankId']."',LedgerId='".$_POST['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }
	   

$ia="insert into painter_outstanding set PainterName='".$_POST['PainterId']."',InvoiceId='".$_POST['InvoiceId']."',PaidDate='".$_POST['PaidDate']."',PaidAmount='".$_POST['PaidAmount']."'";
$Eia=mysqli_query($conn,$ia);


header("location:Painter_voucher.php?msg=Amount Added Successfully!");
?>