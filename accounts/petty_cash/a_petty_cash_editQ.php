<?php
include("../../includes.php");
include("../../redirect.php");
$in="update a_petty_cash set Status='Deactive' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);




$se="select * from a_petty_cash where id='".$_REQUEST['id']."'";
$Ese=mysqli_query($conn,$se);
$FEse=mysqli_fetch_array($Ese);
// if($FEse['LedgerGroup']=='34')
// {
$ica="insert into a_petty_cash set PDate='".$_POST['PDate']."',Inv_no='".$_POST['Inv_no']."',PaymentMode='".$_POST['PaymentMode']."',LedgerGroup='".$_POST['LedgerGroup']."',ExpenseType='".$_POST['ExpenseType']."',PettyAmount='".$_POST['PettyAmount']."',Description='".$_POST['Description']."',Status='Active'";
$Eica=mysqli_query($conn,$ica);
//}

// if($FEse['LedgerGroup']=='2')
// {
	// $bnk="select * from  a_bank_acc where Id='".$FEse['AccountNo']."'";
	// $bnkq=mysqli_query($conn,$bnk);
	// $bnkf=mysqli_fetch_array($bnkq);
	
	 // $cash_acc="insert into account_bank set TransactionDate='".$FEse['ExpenseDate']."',LedgerGroup='".$FEse['LedgerGroup']."',TransactionType='Credit',Amount='".$FEse['ExpenseAmount']."',ReferenceNo='".$FEse['Id']."',TransactionFrom='expense_details',Remarks='Expenses Cancel',BankId='".$bnkf['Id']."',LedgerId='".$bnkf['LedgerId']."'";
	 // $acc_insert=mysqli_query($conn,$cash_acc); 
// }

header("location:a_expense_entry.php?msg=Data Deleted Successfully");
?>