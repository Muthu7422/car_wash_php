<?php
include("../../includes.php");
$cash_ac=17;//17 For Cash Account

if((($_POST['ContraFrom']==$cash_ac)&&($_POST['ContraTo']!=$cash_ac))||(($_POST['ContraFrom']!=$cash_ac)&&($_POST['ContraTo']==$cash_ac)))
{
$to="";
$from="";	
 $in="insert into contra_main set ContraNo='".$_POST['ContraNo']."',ContraDate='".$_POST['ContrDate']."',ContraFrom='".$_POST['ContraFrom']."',ContraTo='".$_POST['ContraTo']."',TransactionAmount='".$_POST['TransactionAmount']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);

if($_POST['ContraFrom']==$cash_ac)
{
	$from="Cash";
	$to="Bank";
	$bankid=$_POST['ContraTo'];
}
else //if($_POST['ContraTo']!=$cash_ac)
{
	$to="Cash";
	$from="Bank";
	$bankid=$_POST['ContraFrom'];
}

$sfb="SELECT * FROM account_cash order by Id desc";
$Esfb=mysqli_query($conn,$sfb);
$FEsfb=mysqli_fetch_array($Esfb);	

$stb="SELECT * FROM account_bank where BankId='$bankid' order by Id desc";
$Estb=mysqli_query($conn,$stb);
$FEstb=mysqli_fetch_array($Estb);

if($from=="Cash")
{
$cash_cb=$FEsfb['cash_bal']-$_POST['TransactionAmount'];	
$bank_cb=$FEstb['bank_bal']+$_POST['TransactionAmount'];

 $isub="insert into contra_sub set ContraMainID='$id',ContraDate='".$_POST['ContrDate']."',AcName='".$_POST['ContraFrom']."',AvailableAmount='".$FEsfb['cash_bal']."',Debit='".$_POST['TransactionAmount']."',Credit='0',CurrentBalance='$cash_cb',RelatedAccount='".$_POST['ContraTo']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";	 
$Eisub=mysqli_query($conn,$isub);
 $isub2="insert into contra_sub set ContraMainID='$id',ContraDate='".$_POST['ContrDate']."',AcName='".$_POST['ContraTo']."',AvailableAmount='".$FEstb['bank_bal']."',Debit='0',Credit='".$_POST['TransactionAmount']."',CurrentBalance='$bank_cb',RelatedAccount='".$_POST['ContraFrom']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";	 
$Eisub=mysqli_query($conn,$isub2);	

//Account_bank and Account_Cash Entry Start
 $ica="insert into account_cash set Remarks='Contra Entry',TransactionDate='".$_POST['ContrDate']."',LedgerGroup='',cash_bal='$cash_cb',TransactionType='Debit',Amount='".$_POST['TransactionAmount']."',ReferenceNo='$id',TransactionFrom='Contra Entry',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica=mysqli_query($conn,$ica);
 $cash_acc="insert into account_bank set TransactionDate='".$_POST['ContrDate']."',LedgerGroup='',TransactionType='Credit',bank_bal='$bank_cb',Amount='".$_POST['TransactionAmount']."',ReferenceNo='".$id."',TransactionFrom='Contra Entry',Remarks='Contra Entry',BankId='$bankid',LedgerId='',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
//Account_bank and Account_Cash Entry Stop
}
if($from=="Bank")
{
$cash_cb=$FEsfb['cash_bal']+$_POST['TransactionAmount'];	
$bank_cb=$FEstb['bank_bal']-$_POST['TransactionAmount'];	

 $isub="insert into contra_sub set ContraMainID='$id',ContraDate='".$_POST['ContrDate']."',AcName='".$_POST['ContraTo']."',AvailableAmount='".$FEsfb['cash_bal']."',Debit='0',Credit='".$_POST['TransactionAmount']."',CurrentBalance='$cash_cb',RelatedAccount='".$_POST['ContraFrom']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";	 
$Eisub=mysqli_query($conn,$isub);
 $isub2="insert into contra_sub set ContraMainID='$id',ContraDate='".$_POST['ContrDate']."',AcName='".$_POST['ContraFrom']."',AvailableAmount='".$FEstb['bank_bal']."',Debit='".$_POST['TransactionAmount']."',Credit='0',CurrentBalance='$bank_cb',RelatedAccount='".$_POST['ContraTo']."',Status='Active',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";	 
$Eisub=mysqli_query($conn,$isub2);

//Account_bank and Account_Cash Entry Start
 $ica="insert into account_cash set Remarks='Contra Entry',TransactionDate='".$_POST['ContrDate']."',LedgerGroup='',cash_bal='$cash_cb',TransactionType='Credit',Amount='".$_POST['TransactionAmount']."',ReferenceNo='$id',TransactionFrom='Contra Entry',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica=mysqli_query($conn,$ica);
 $cash_acc="insert into account_bank set TransactionDate='".$_POST['ContrDate']."',LedgerGroup='',TransactionType='Debit',bank_bal='$bank_cb',Amount='".$_POST['TransactionAmount']."',ReferenceNo='".$id."',TransactionFrom='Contra Entry',Remarks='Contra Entry',BankId='$bankid',LedgerId='',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
//Account_bank and Account_Cash Entry Stop	
}
header("location:contra_entry.php?msg=Transaction Success!");
}
else{
header("location:contra_entry.php?msg=Invalid Transaction!");
}
?>