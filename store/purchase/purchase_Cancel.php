<?php
include("../../includes.php");
include("../../redirect.php");

$inv_no=$_REQUEST['inv_no'];

$rpe1="select * from s_purchase where inv_no='$inv_no'"; 
$rpm1=mysqli_query($conn,$rpe1);
$spm1=mysqli_fetch_array($rpm1);

 $rpe="select * from s_purchase_details where inv_no='".$spm1['id']."'"; 
$rpm=mysqli_query($conn,$rpe);
while($spm=mysqli_fetch_array($rpm))
{
 $stock="update item_stock set StockQuantity=StockQuantity - '".$spm['qty']."' where ItemId='".$spm['spare_name']."' and FranchiseeId='".$_SESSION['BranchId']."' and Uom='".$spm['unit']."'"; 
$stk=mysqli_query($conn,$stock);

 $purchase="update s_purchase set purchase_details='Close' where inv_no='$inv_no' and FranchiseeId='".$_SESSION['BranchId']."'"; 
$pur=mysqli_query($conn,$purchase);

$billa="update s_purchase_details set purchase_details='Close' where inv_no='".$spm['inv_no']."'"; 
$billeb=mysqli_query($conn,$billa);
}
$dem="select * from m_supplier where sid='".$spm1['supplier_name']."'";
$rmp=mysqli_query($conn,$dem);
$rcm=mysqli_fetch_array($rmp);
		 if($spm1['paymentoption']=='Cash' )
	   {		  
$cash_acc="insert into account_cash set TransactionDate='".$spm1['pdate']."',LedgerGroup='".$spm1['LedgerGroup']."',TransactionType='Credit',Amount='".$spm1['PaidAmount']."',ReferenceNo='".$spm1['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase Cancel',LedgerId='".$rcm['LedgerId']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
	   }

$demaa="select * from a_bank_acc where Id='".$spm1['AccountNo']."'";
$rmpaa=mysqli_query($conn,$demaa);
$rcmaa=mysqli_fetch_array($rmpaa);

 if(($spm1['paymentoption']!='Cash') && ($spm1['paymentoption']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$spm1['pdate']."',LedgerGroup='".$spm1['LedgerGroup']."',TransactionType='Credit',Amount='".$spm1['PaidAmount']."',ReferenceNo='".$spm1['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase Cancel',BankId='".$rcmaa['Id']."',LedgerId='".$rcm['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

$stand="select * from sup_outstanding where invoice='$inv_no' and cust_name='".$spm1['supplier_name']."'";
$spt=mysqli_query($conn,$stand);
$rep=mysqli_fetch_array($spt);

$stand1="select * from sup_outstanding where cust_name='".$spm1['supplier_name']."' order by id desc";
$spt1=mysqli_query($conn,$stand1);
$rep1=mysqli_fetch_array($spt1);


  $out="insert into sup_outstanding set cust_name='".$spm1['supplier_name']."',invoice='".$spm1['inv_no']."',p_date='".$spm1['pdate']."',invoice_amt='".$spm1['total']."',total_outstanding='".$rep1['total_outstanding']."' - '".$spm1['total']."',balance_amt='".$rep['balance_amt']."' - '".$spm1['total']."'"; 
$outp=mysqli_query($conn,$out); 


header("Location:s_purchase_view.php");
?>