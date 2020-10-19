<?php
include("../../includes.php");
include("../../redirect.php");

$service_cash_memo_no=$_REQUEST['service_cash_memo_no'];

$rpe="select * from service_cash_memo_details where service_cash_memo_no='$service_cash_memo_no'"; 
$rpm=mysql_query($rpe);
while($spm=mysql_fetch_array($rpm))
{
	
//$pos="select * from m_spare where sname='".$spm['sname']."'";
//$rmp=mysql_query($pos);
//$scm=mysql_fetch_array($rmp);

 $stock="update item_stock set StockQuantity=StockQuantity + '".$spm['qty']."' where ItemId='".$spm['service_type']."'"; 
 $stk=mysql_query($stock);

 $billa="update service_cash_memo_details set  bill_status='Close' where service_cash_memo_no='".$spm['service_cash_memo_no']."'"; 
 $billeb=mysql_query($billa); 
 
}

$bill="update service_cash_memo set  bill_status='Close' where service_cash_memo_no='$service_cash_memo_no'"; 
$bille=mysql_query($bill);


$ps="select * from service_cash_memo where service_cash_memo_no='$service_cash_memo_no'";
$psb=mysql_query($ps);
$pamt=mysql_fetch_array($psb);

$dem="select * from a_customer where id='".$pamt['customer_name']."'";
$rmp=mysql_query($dem);
$rcm=mysql_fetch_array($rmp);

	 // if($pamt['payment_mode']=='Cash' )
	   // {		  			
// $cash_acc="insert into account_cash set TransactionDate='".date("Y-m-d")."',LedgerGroup='".$pamt['LedgerGroup']."',TransactionType='Debit',Amount='".$pamt['rec_amt']."',ReferenceNo='".$pamt['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales Cancel',LedgerId='".$rcm['LedgerId']."'";
// $acc_insert=mysql_query($cash_acc); 
	   // }

// $demaa="select * from a_bank_acc where Id='".$pamt['AccountNo']."'";
// $rmpaa=mysql_query($demaa);
// $rcmaa=mysql_fetch_array($rmpaa);

// if(($pamt['payment_mode']!='Cash') && ($pamt['payment_mode']!='Credit') )
	   // {
	      // $cash_acc="insert into account_bank set TransactionDate='".date("Y-m-d")."',LedgerGroup='".$pamt['LedgerGroup']."',TransactionType='Debit',Amount='".$pamt['rec_amt']."',ReferenceNo='".$pamt['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales Cancel',BankId='".$rcmaa['Id']."',LedgerId='".$rcm['LedgerId']."'";
	      // $acc_insert=mysql_query($cash_acc); 
       // }

// $rpe1="select * from a_customer where cust_name='".$pamt['cname']."'"; 
// $rpm1=mysql_query($rpe1);
// $spm1=mysql_fetch_array($rpm1);

// if($pamt['payment_mode']=='Credit')
// {

// $stand="select * from cust_outstanding where invoice='$inv_no' and cust_name='".$pamt['cname']."'";
// $spt=mysql_query($stand);
// $rep=mysql_fetch_array($spt);

// $stand1="select * from cust_outstanding where cust_name='".$pamt['cname']."' order by id desc";
// $spt1=mysql_query($stand1);
// $rep1=mysql_fetch_array($spt1);


 // $out="insert into cust_outstanding set cust_name='".$pamt['cname']."',invoice='".$pamt['inv_no']."',p_date='".$pamt['sdate']."',invoice_amt='".$pamt['bill_amt']."',total_outstanding='".$rep1['total_outstanding']."' - '".$pamt['bal_amt']."',balance_amt='".$rep['balance_amt']."' - '".$pamt['bal_amt']."'"; 
 // $outp=mysql_query($out); 
// }

header("Location:service_cash_memo_view.php");

?>