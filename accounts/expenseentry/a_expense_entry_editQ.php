<?php
include("../../includes.php");
include("../../redirect.php");
$in="update expense_details set Status='Deactive' where Id='".$_REQUEST['Id']."'";
$Ein=mysqli_query($conn,$in);




$se="select * from expense_details where Id='".$_REQUEST['Id']."'";
$Ese=mysqli_query($conn,$se);
$FEse=mysqli_fetch_array($Ese);
if($FEse['LedgerGroup']=='34')
{
$ica="insert into account_cash set Remarks='Return From Expenses',TransactionDate='".$FEse['ExpenseDate']."',LedgerGroup='".$FEse['ExpenseType']."',TransactionType='Credit',Amount='".$FEse['ExpenseAmount']."',ReferenceNo='".$_REQUEST['Id']."',TransactionFrom='expense_details'";
$Eica=mysqli_query($conn,$ica);
}

if($FEse['LedgerGroup']=='2')
{
	$bnk="select * from  a_bank_acc where Id='".$FEse['AccountNo']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
	
	 $cash_acc="insert into account_bank set TransactionDate='".$FEse['ExpenseDate']."',LedgerGroup='".$FEse['LedgerGroup']."',TransactionType='Credit',Amount='".$FEse['ExpenseAmount']."',ReferenceNo='".$FEse['Id']."',TransactionFrom='expense_details',Remarks='Expenses Cancel',BankId='".$bnkf['Id']."',LedgerId='".$bnkf['LedgerId']."'";
	 $acc_insert=mysqli_query($conn,$cash_acc); 
}

header("location:a_expense_entry_view.php?msg=Data Deleted Successfully");
?>