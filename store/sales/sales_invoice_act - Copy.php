<?php
include("../../includes.php");
include("../../redirect.php");

 $som="insert into sales_invoice set inv_no='".$_POST['inv_no']."',sdate='".$_POST['date']."',branch_name='".$_POST['branch_name']."',cname='".$_POST['customer_name']."',cust_out_stand='".$_POST['out']."',gstin='".$_POST['gstin']."',total_amt='".$_POST['total']."',discount_per='".$_POST['discount_per']."',total='".$_POST['total_amt']."',dicount_amt='".$_POST['dicount_amt']."',sgst='".$_POST['sgst']."',cgst='".$_POST['cgst']."',igst='".$_POST['igst']."',gst_amt='".$_POST['gst_amt']."',bill_amt='".$_POST['bill_amt']."',rec_amt='".$_POST['recable_amount']."',bal_amt='".$_POST['balance_amount']."',payment_mode='".$_POST['payment_mode']."',FranchiseeId='".$_SESSION['FranchiseeId']."',description='".$_POST['description']."',bill_status='Open',LedgerGroup='".$_POST['LedgerGroup']."',AccountNo='".$_POST['AccountNo']."'"; 
 $soms=mysql_query($som); 
 $pcm=mysql_insert_id();
if($_POST['payment_mode']=="Cash")
{
$cash_acc="insert into account_cash set TransactionDate='".$_POST['date']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['recable_amount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales',LedgerId='".$_POST['CLI']."'";
$acc_insert=mysql_query($cash_acc); 	
}

 if(($_POST['payment_mode']!='Cash') && ($_POST['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['date']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['recable_amount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales',BankId='".$_POST['BankId']."',LedgerId='".$_POST['LedgerId']."'";
	      $acc_insert=mysql_query($cash_acc); 
       }

 
for($i=1;$i<11;$i++)
{
	if($_POST['amount'.$i]!="")
{
 $pms="insert into sales_invoice_details set inv_id='$pcm',inv_no='".$_POST['inv_no']."',spard_brand='".$_POST['spare_brand'.$i]."',spare_name='".$_POST['spare_name'.$i]."',mrp='".$_POST['mrp'.$i]."',qty='".$_POST['qty'.$i]."',total='".$_POST['amount'.$i]."'"; 
 $Epms=mysql_query($pms); 


$stm="select * from item_stock where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
$sitm=mysql_query($stm);
$nr=mysql_num_rows($sitm);
$Ditm=mysql_fetch_array($nr);

 $sss="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty'.$i]."' where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
 $Esss=mysql_query($sss);

}
	
}

if($_POST['payment_mode']=="Credit")
{
 $sbo1="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc"; 
 $Esbo1=mysql_query($sbo1);
 $FEsbo1=mysql_fetch_array($Esbo1);
if($FEsbo1['ad_amount']=='')
{
	$eaa=0;
}
else
{
	$eaa=$FEsbo1['ad_amount'];
}


$tout=$FEsbo1['total_outstanding']+$_POST['balance_amount'];

//Out Standing Start
$tia=$_POST['balance_amount'];

//$pm2="select * from s_purchase_temp where inv_no='".$_POST['inv_no']."'";
//$Epm2=mysql_query($pm2);
//$Fpm2=mysql_fetch_array($Epm2);

$sbo="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc";
$Esbo=mysql_query($sbo);
$FEsbo=mysql_fetch_array($Esbo);

$ttlos=$FEsbo['total_outstanding']+$tia;

 $pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$_POST['customer_name']."',invoice_amt='$tia',invoice = '".$_POST['inv_no']."',paid_amt='0',p_date='".$_POST['date']."',balance_amt='$tia',total_outstanding='$ttlos'";  
$Epi1=mysql_query($pi1);
//Outstandung End

//$pm1="insert into cust_outstanding set ad_amount='$eaa',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='".$_POST['bal_amt']."',invoice = '".$_POST['inv_no']."',paid_date='".$_POST['bdate']."',paid_amt='0',p_date='".$_POST['bdate']."',balance_amt='".$_POST['bal_amt']."',total_outstanding='$tout',payment_mode='Final Bill'";  
//$Epm1=mysql_query($pm1); 

$cust="update a_customer set cus_out_amt='$ttlos' where id='".$_POST['customer_name']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
$custo=mysql_query($cust);

}
$inv_no=$_POST['inv_no'];
header("location:sales_invoice_receipt.php?inv_no=$inv_no");
?>