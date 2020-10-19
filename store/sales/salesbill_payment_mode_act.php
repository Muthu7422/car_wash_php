<?php
include("../../includes.php");

 $pr="update sales_invoice set ActualSellingPrice='".$_POST['SellingPrice']."',discount_per='".$_POST['DiscountPer']."',dicount_amt='".$_POST['DiscountAmount']."',bill_amt='".$_POST['TotalBillAmount']."',rec_amt='".$_POST['ReceivedAmount']."',bal_amt='".$_POST['BalanceAmount']."',payment_mode='".$_POST['payment_mode']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',LedgerGroup='".$_POST['LedgerGroup']."' where id='".$_POST['id']."'"; 
$Epr=mysqli_query($conn,$pr);  

$Eds="select * from sales_invoice where id='".$_POST['id']."'";
$wa=mysqli_query($conn,$Eds);
$Xc=mysqli_fetch_array($wa);

if($_POST['payment_mode']=="Cash")
{
$cash_acc="insert into account_cash set TransactionDate='".$Xc['sdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['ReceivedAmount']."',ReferenceNo='".$Xc['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales',LedgerId='".$Xc['LedgerId']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if(($_POST['payment_mode']!='Cash') && ($_POST['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$Xc['sdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['ReceivedAmount']."',ReferenceNo='".$Xc['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales',BankId='".$_POST['BankId']."',LedgerId='".$Xc['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

$dgp="update s_add_package set AvailableAmount=AvailableAmount-'".$_POST['FromOfferAmt']."' where VehicleId='".$Xc['cvehile']."'";
$rtmp=mysqli_query($conn,$dgp);

if($_POST['payment_mode']=="Credit")
{
$sbo1="select * from cust_outstanding where cust_name='".strtoupper($Xc['cname'])."' order by id desc"; 
$Esbo1=mysqli_query($conn,$sbo1);
$FEsbo1=mysqli_fetch_array($Esbo1);
if($FEsbo1['ad_amount']=='')
{
	$eaa=0;
}
else
{
	$eaa=$FEsbo1['ad_amount'];
}


$tout=$FEsbo1['total_outstanding']+$_POST['BalanceAmount'];

//Out Standing Start
$tia=$_POST['BalanceAmount'];

//$pm2="select * from s_purchase_temp where inv_no='".$_POST['inv_no']."'";
//$Epm2=mysqli_query($pm2);
//$Fpm2=mysqli_fetch_array($Epm2);

$sbo="select * from cust_outstanding where cust_name='".strtoupper($Xc['cname'])."' order by id desc";
$Esbo=mysqli_query($conn,$sbo);
$FEsbo=mysqli_fetch_array($Esbo);

$ttlos=$FEsbo['total_outstanding']+$tia;

 $pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".strtoupper($Xc['cname'])."',invoice_amt='$tia',invoice = '".strtoupper($Xc['inv_no'])."',paid_amt='0',p_date='".strtoupper($Xc['sdate'])."',balance_amt='$tia',total_outstanding='$ttlos'";  
$Epi1=mysqli_query($conn,$pi1);
//Outstandung End

//$pm1="insert into cust_outstanding set ad_amount='$eaa',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='".$_POST['bal_amt']."',invoice = '".$_POST['inv_no']."',paid_date='".$_POST['bdate']."',paid_amt='0',p_date='".$_POST['bdate']."',balance_amt='".$_POST['bal_amt']."',total_outstanding='$tout',payment_mode='Final Bill'";  
//$Epm1=mysqli_query($pm1); 
}
$inv_no=$Xc['inv_no'];
header("location:sales_invoice_receipt.php?inv_no=$inv_no");

?>