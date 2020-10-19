<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


// $Es="select * from expense_details where ExpenseType='".$_POST['ExpenseType']."' AND ExpenseDate='".$_POST['ExpenseDate']."' AND LedgerGroup='".$_POST['LedgerGroup']."' AND ExpenseAmount='".$_POST['ExpenseAmount']."' AND status='Active'"; 
// $Eps=mysqli_query($conn,$Es);
// $duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
 echo $in="insert into expense_details set ExpenseDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',ExpenseType='".$_POST['ExpenseType']."',ExpenseAmount='".$_POST['ExpenseAmount']."',ExpenseDescription='".$_POST['ExpenseDescription']."',TaxAmount='".$_POST['TaxAmount']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);
if($_POST['PaymentMode']=='Cash')
{
  $ica="insert into account_cash set Remarks='".$_POST['ExpenseDescription']."',TransactionDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['ExpenseAmount']."',ReferenceNo='$id',TransactionFrom='expense_details',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$Eica=mysqli_query($conn,$ica);

$acb="insert into account_cash_bank set date='".$_POST['ExpenseDate']."',ledger_group_id='".$_POST['LedgerGroup']."',ledger_id='".$_POST['ExpenseT']."',payment_mode='".$_POST['PaymentMode']."',type='Debit',amount='".$_POST['ExpenseAmount']."',Narration='Expenses Details',table_id='$id',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";                   
$Eacb=mysqli_query($conn,$acb); 

$acb="insert into account_cash_bank set date='".$_POST['ExpenseDate']."',ledger_group_id='5',ledger_id='5',payment_mode='".$_POST['PaymentMode']."',type='Debit',amount='".$_POST['ExpenseAmount']."',Narration='Expenses Details',table_id='$id',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";                   
$Eacb=mysqli_query($conn,$acb); 
}
if($_POST['PaymentMode']=='Bank')
{
	$bnk="select * from  a_bank_acc where Id='".$_POST['AccountNo']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
	
	 $cash_acc="insert into account_bank set TransactionDate='".$_POST['ExpenseDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['ExpenseAmount']."',ReferenceNo='".$id."',TransactionFrom='expense_details',Remarks='Expenses',BankId='".$bnkf['Id']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	 $acc_insert=mysqli_query($conn,$cash_acc); 

$acb="insert into account_cash_bank set date='".$_POST['ExpenseDate']."',ledger_group_id='".$_POST['LedgerGroup']."',ledger_id='".$_POST['ExpenseT']."',payment_mode='".$_POST['PaymentMode']."',type='Debit',amount='".$_POST['ExpenseAmount']."',Narration='Expenses Details',table_id='',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";                   
$Eacb=mysqli_query($conn,$acb);

$acb="insert into account_cash_bank set date='".$_POST['ExpenseDate']."',ledger_group_id='1',ledger_id='1',payment_mode='".$_POST['PaymentMode']."',type='Debit',amount='".$_POST['ExpenseAmount']."',Narration='Expenses Details',table_id='$id',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";                   
$Eacb=mysqli_query($conn,$acb); 
}

header("location:a_expense_entry_view.php?msg=Data Saved Sucessfully!");
}
else
{
	header("location:a_expense_entry.php?msg=Already Exiting !");
}
?>