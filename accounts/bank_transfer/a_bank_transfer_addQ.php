<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from expense_details where ExpenseType='".$_POST['ExpenseType']."' AND ExpenseDate='".$_POST['ExpenseDate']."' AND LedgerGroup='".$_POST['LedgerGroup']."' AND ExpenseAmount='".$_POST['ExpenseAmount']."' AND status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into expense_details set ExpenseDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',ExpenseType='".$_POST['ExpenseType']."',emp_name='".$_POST['emp_name']."',AccountNo='".$_POST['AccountNo']."',ExpenseAmount='".$_POST['ExpenseAmount']."',ExpenseDescription='".$_POST['ExpenseDescription']."',TaxAmount='".$_POST['TaxAmount']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);
if($_POST['PaymentMode']=='Cash')
{
 $ica="insert into account_cash set Remarks='".$_POST['ExpenseDescription']."',TransactionDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['ExpenseAmount']."',ReferenceNo='$id',TransactionFrom='expense_details'";
$Eica=mysqli_query($conn,$ica);
}
if($_POST['PaymentMode']=='Bank')
{
	$bnk="select * from  a_bank_acc where Id='".$_POST['AccountNo']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
	
	 $cash_acc="insert into account_bank set TransactionDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['ExpenseAmount']."',ReferenceNo='".$id."',TransactionFrom='expense_details',Remarks='Expenses',BankId='".$bnkf['Id']."',LedgerId='".$bnkf['LedgerId']."'";
	 $acc_insert=mysqli_query($conn,$cash_acc); 
}

header("location:a_expense_entry.php?msg=Data Saved Sucessfully!");
}
else
{
	header("location:a_expense_entry.php?msg=Already Exiting !");
}
?>