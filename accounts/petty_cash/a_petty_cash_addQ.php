<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);






$Es="select * from a_petty_cash where PettyType='".$_POST['PettyType']."' AND PDate='".$_POST['PDate']."' AND LedgerGroup='".$_POST['LedgerGroup']."' AND ExpenseAmount='".$_POST['ExpenseAmount']."' AND status='Active' And franchisee_id='".$_SESSION['BranchId']."'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
 $in="insert into a_petty_cash set PDate='".$_POST['PDate']."',Inv_no='".$_POST['Inv_no']."',PaymentMode='".$_POST['PaymentMode']."',LedgerGroup='".$_POST['LedgerGroup']."',PettyType='".$_POST['PettyType']."',PettyAmount='".$_POST['PettyAmount']."',Description='".$_POST['Description']."',franchisee_id='".$_POST['franchisee_name']."',vendor_id='".$_SESSION['VendorId']."',status='Active'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);

// $li="insert into general_ledger set ledger_date='".$_POST['PDate']."',petty_cash_amount='".$_POST['PettyAmount']."',petty_cash_id='".$_POST['Inv_no']."',ledger_status='Petty Cash'";
// $Eli=mysqli_query($conn,$li);

if($_POST['PaymentMode']=='Cash')
{
	
	 $acce15="select * from m_ledger where Id='".$_POST['PettyType']."'";
					$sccqe15=mysqli_query($conn,$acce15);
					$acfe15=mysqli_fetch_array($sccqe15); 

					
				 $acce="select * from m_ledger where LedgerGroup='".$_POST['LedgerGroup']."'";
					$sccqe=mysqli_query($conn,$acce);
					$acfe=mysqli_fetch_array($sccqe);
					
	          $acc1="select * from account_cash order by id desc";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
				$open=$acf1['cash_bal']-$_POST['PettyAmount'];
  $ica="insert into account_cash set Remarks='".$_POST['ExpenseDescription']."',TransactionDate='".$_POST['PDate']."',LedgerGroup='".$_POST['LedgerGroup']."',cash_bal='$open',TransactionType='Debit',Amount='".$_POST['PettyAmount']."',ReferenceNo='$id',TransactionFrom='PettyCash_details',LedgerId='".$acfe['Id']."',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica=mysqli_query($conn,$ica); 

	  $ica11="insert into account_cash_bank set date='".$_POST['PDate']."',ledger_group_id='5',ledger_id='5',payment_mode='".$_POST['PaymentMode']."',amount='".$_POST['PettyAmount']."',type='Debit',Narration='Petty Cash',table_id='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica11=mysqli_query($conn,$ica11);


  $ica12="insert into account_cash_bank set date='".$_POST['PDate']."',ledger_group_id='".$_POST['LedgerGroup']."',ledger_id='".$acfe15['Id']."',payment_mode='".$_POST['PaymentMode']."',amount='".$_POST['PettyAmount']."',type='Debit',Narration='Petty Cash',table_id='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica12=mysqli_query($conn,$ica12);



}
if($_POST['PaymentMode']=='Bank')
{
	                 $acce16="select * from m_ledger where ledid='".$_POST['PettyType']."'";
					$sccqe16=mysqli_query($conn,$acce16);
					$acfe16=mysqli_fetch_array($sccqe16);
	
	    $acce="select * from m_ledger where LedgerGroup='".$_POST['LedgerGroup']."'";
					$sccqe=mysqli_query($conn,$acce);
					$acfe=mysqli_fetch_array($sccqe);
					
    $bnk="select * from  a_bank_acc where Id='".$_POST['BankNameT']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
					
					$acc="select * from account_bank where bankId='".$_POST['BankNameT']."'order by Id desc";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
				$open1=$acf['bank_bal']-$_POST['PettyAmount'];
	
 $cash_acc="insert into account_bank set TransactionDate='".$_POST['PDate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',bank_bal='$open1',Amount='".$_POST['PettyAmount']."',ReferenceNo='".$id."',TransactionFrom='PettyCash_details',Remarks='PettyCash',BankId='".$bnkf['Id']."',LedgerId='".$acfe['Id']."',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
	 $acc_insert=mysqli_query($conn,$cash_acc); 
	 
	  $ica13="insert into account_cash_bank set date='".$_POST['PDate']."',ledger_group_id='1',ledger_id='1',payment_mode='".$_POST['PaymentMode']."',amount='".$_POST['PettyAmount']."',type='Debit',Narration='Petty Cash',table_id='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica13=mysqli_query($conn,$ica13);

 $ica14="insert into account_cash_bank set date='".$_POST['PDate']."',ledger_group_id='".$_POST['LedgerGroup']."',ledger_id='".$acfe16['Id']."',payment_mode='".$_POST['PaymentMode']."',amount='".$_POST['PettyAmount']."',type='Debit',Narration='Petty Cash',table_id='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica14=mysqli_query($conn,$ica14);
	 
}

if($_POST['PaymentMode']=='NA')
{
	                 $acce16="select * from m_ledger where ledid='".$_POST['PettyType']."'";
					$sccqe16=mysqli_query($conn,$acce16);
					$acfe16=mysqli_fetch_array($sccqe16);
	
	    $acce="select * from m_ledger where LedgerGroup='".$_POST['LedgerGroup']."'";
					$sccqe=mysqli_query($conn,$acce);
					$acfe=mysqli_fetch_array($sccqe);
					
    $bnk="select * from  a_bank_acc where Id='".$_POST['BankNameT']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
					
					$acc="select * from account_bank where bankId='".$_POST['BankNameT']."'order by Id desc";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
				$open1=$acf['bank_bal']-$_POST['PettyAmount'];
	
	

 $ica14="insert into account_cash_bank set date='".$_POST['PDate']."',ledger_group_id='".$_POST['LedgerGroup']."',ledger_id='".$acfe16['Id']."',payment_mode='".$_POST['PaymentMode']."',amount='".$_POST['PettyAmount']."',type='Debit',Narration='Petty Cash',table_id='$id',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";
$Eica14=mysqli_query($conn,$ica14);
	 
}




header("location:a_petty_cash.php?msg=Data Saved Sucessfully!");
}
else
{
	header("location:a_petty_cash.php?msg=Already Exiting !");
}
?>