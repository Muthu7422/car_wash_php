<?php
include("../../includes.php");
include("../../redirect.php");

$inv_no=$_REQUEST['inv_no'];

 $rpe="select * from a_final_bill_spare_details where inv_no='$inv_no'"; 
$rpm=mysqli_query($conn,$rpe);
while($spm=mysqli_fetch_array($rpm))
{
	
//$pos="select * from m_spare where sname='".$spm['sname']."'";
//$rmp=mysqli_query($pos);
//$scm=mysqli_fetch_array($rmp);

 $stock="update item_stock set StockQuantity=StockQuantity + '".$spm['sqty']."' where ItemId='".$spm['sname']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$stk=mysqli_query($conn,$stock);

 
}



$bill="update a_final_bill set  bill_status='Close' where inv_no='$inv_no'"; 
$bille=mysqli_query($conn,$bill);


$ps="select * from a_final_bill where inv_no='$inv_no'";
$psb=mysqli_query($conn,$ps);
$pamt=mysqli_fetch_array($psb);

$dcm="select * from a_customer where id='".trim($pamt['cname'])."'"; 
 $edm=mysqli_query($conn,$dcm);
 $emp=mysqli_fetch_array($edm);
if($_POST['payment_mode']=='Cash')
{
$cash_acc="insert into account_cash set TransactionDate='".date("Y-m-d")."',LedgerGroup='".$pamt['LedgerGroup']."',TransactionType='Debit',Amount='".$pamt['rec_amt']."',ReferenceNo='".$pamt['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service Cancel',LedgerId='".$emp['LedgerId']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
}

$demaa="select * from a_bank_acc where Id='".$pamt['AccountNo']."'";
$rmpaa=mysqli_query($conn,$demaa);
$rcmaa=mysqli_fetch_array($rmpaa);

 if(($_POST['payment_mode']!='Cash') && ($_POST['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".date("Y-m-d")."',LedgerGroup='".$pamt['LedgerGroup']."',TransactionType='Debit',Amount='".$pamt['rec_amt']."',ReferenceNo='".$pamt['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service Cancel',BankId='".$rcmaa['Id']."',LedgerId='".$emp['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

//$rpe1="select * from a_customer where cust_name='".$pamt['cname']."'"; 
//$rpm1=mysqli_query($rpe1);
//$spm1=mysqli_fetch_array($rpm1);

if($pamt['ptype']!='cash')
{

$stand="select * from cust_outstanding where invoice='$inv_no' and cust_name='".$pamt['cname']."'";
$spt=mysqli_query($conn,$stand);
$rep=mysqli_fetch_array($spt);

$stand1="select * from cust_outstanding where cust_name='".$pamt['cname']."' order by id desc";
$spt1=mysqli_query($conn,$stand1);
$rep1=mysqli_fetch_array($spt1);


  $out="insert into cust_outstanding set cust_name='".$pamt['cname']."',invoice='".$pamt['inv_no']."',p_date='".$pamt['bill_date']."',invoice_amt='".$pamt['bill_amt']."',total_outstanding='".$rep1['total_outstanding']."' - '".$pamt['bal_amt']."',balance_amt='".$rep['balance_amt']."' - '".$pamt['bal_amt']."'"; 
$outp=mysqli_query($conn,$out); 
}

header("Location:f_bill_view.php");

?>