<?php
include("../../includes.php");

 $pr="update a_final_bill set ActualSellingPrice='".$_POST['SellingPrice']."',sgst='".$_POST['sgst']."',cgst='".$_POST['cgst']."',igst='".$_POST['igst']."',discount='".$_POST['DiscountPer']."',tot_amt='".$_POST['DiscountAmount']."',paid_amt='".$_POST['PaidAdvanceAmt']."',from_off_amt='".$_POST['FromOfferAmt']."',bill_amt='".$_POST['TotalBillAmount']."',rec_amt='".$_POST['ReceivedAmount']."',bal_amt='".$_POST['BalanceAmount']."',ptype='".$_POST['payment_mode']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',Total_bill_Amount='".$_POST['TotalAmount']."' where id='".$_POST['id']."'"; 
$Epr=mysqli_query($conn,$pr);  

 $fb="select * from a_final_bill where id='".$_POST['id']."'"; 
$fbq=mysqli_query($conn,$fb);
$fbf=mysqli_fetch_array($fbq);

  $jobcard="select * from s_job_card where job_card_no='".$fbf['job_card_no']."'"; 
$jobcardq=mysqli_query($conn,$jobcard);
$jobcardf=mysqli_fetch_array($jobcardq);
 $rating=$jobcardf['q1']+$jobcardf['q2']+$jobcardf['q3']+$jobcardf['q4']+$jobcardf['q5']; 
$ch = curl_init();

$a=$_POST['TotalAmount'];

 $m=$fbf['cmobile'];

//Username: shakilaauto@gmail.com

$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";
if($rating > '7')
{
$msgtxt="Dear Customer , Thank you for your visit. Your total bill value is Rs.".$a."/-. and you have provided a feedback rating of ".$Rating."";
}
else
{
$msgtxt="Dear Customer , Thank you for your visit. Our management will contact you shortly to resolve the issue within 24 hours has to be sent";	
}
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
//if(empty ($buffer))
//{ echo " buffer is empty "; }
//else
//{ echo $buffer; }
curl_close($ch);
	

$Eds="select * from a_final_bill where id='".$_POST['id']."'";
$wa=mysqli_query($conn,$Eds);
$Xc=mysqli_fetch_array($wa);

if($_POST['payment_mode']=="Cash")
{
 $cash_acc="insert into account_cash set TransactionDate='".$Xc['bill_date']."',LedgerGroup='".$Xc['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['ReceivedAmount']."',ReferenceNo='".$Xc['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service',LedgerId='".$Xc['LedgerId']."'";
 $acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if(($_POST['payment_mode']!='Cash') && ($_POST['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$Xc['bill_date']."',LedgerGroup='".$Xc['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['ReceivedAmount']."',ReferenceNo='".$Xc['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service',BankId='".$_POST['BankId']."',LedgerId='".$Xc['LedgerId']."'";
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

 $pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".strtoupper($Xc['cname'])."',invoice_amt='$tia',invoice = '".strtoupper($Xc['inv_no'])."',paid_amt='0',p_date='".strtoupper($Xc['bill_date'])."',balance_amt='$tia',total_outstanding='$ttlos'";  
$Epi1=mysqli_query($conn,$pi1);
//Outstandung End

//$pm1="insert into cust_outstanding set ad_amount='$eaa',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='".$_POST['bal_amt']."',invoice = '".$_POST['inv_no']."',paid_date='".$_POST['bdate']."',paid_amt='0',p_date='".$_POST['bdate']."',balance_amt='".$_POST['bal_amt']."',total_outstanding='$tout',payment_mode='Final Bill'";  
//$Epm1=mysqli_query($pm1); 
}
$inv_no=$Xc['inv_no'];
$JobcardId=$Xc['JobcardId'];
header("location:final_receipt.php?inv_no=$inv_no&&JobcardId=$JobcardId");

?>