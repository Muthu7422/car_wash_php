<?php
include("../../includes.php");

$smsa=$_POST['sms'];
if($smsa=="ENABLE")
{
$ch = curl_init();

$v=$_POST['vehile_no'];
$a=$_POST['bill_amt'];

 $m=$_POST['mobile'];
//Username: shakilaauto@gmail.com

$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";

$msgtxt="Dear Customer , Thanks for your Business with Motospa. Your Vehicle ".$v." is ready to Delivery.Invoice Amount is Rs.".$a."/-. Please Visit Again ";
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
	
	
}
  $pr="insert into a_final_bill set bill_date='".$_POST['bdate']."',inv_no='".$_POST['inv_no']."',job_card_no='".$_POST['job_card']."',cname='".$_POST['cname']."',cmobile='".$_POST['mobile']."',caddrs='".$_POST['address']."',cvehile='".$_POST['vehile_no']."',remarks='".$_POST['remarks']."',ser_amt='".$_POST['total_service_amt']."',gst='".$_POST['gst']."',discount='".$_POST['discount']."',tot_amt='".$_POST['total_amt']."',other_charge='".$_POST['others_charge']."',bill_amt='".$_POST['bill_amt']."',ptype='".$_POST['payment_mode']."',rec_amt='".$_POST['rec_amt']."',bal_amt='".$_POST['bal_amt']."',paid_amt='".$_POST['offer_amt']."',from_off_amt='".$_POST['fromoffer_amt']."',sms='".$_POST['sms']."',cust_out_amt='".$_POST['cust_out_amt']."',FrachiseeId='".$_SESSION['FranchiseeId']."',LedgerGroup='".$_POST['LedgerGroup']."',AccountNo='".$_POST['AccountNo']."'";
$Epr=mysqli_query($conn,$pr);  
$id=mysqli_insert_id($conn,);

$checkbox=$_POST['Packagedetails'];
for($i=0;$i<=sizeof($checkbox);$i++)
{
	if($checkbox[$i]!='')
	{
$tr="insert into finalbillpackage set BillNo='".$_POST['inv_no']."',JobCardNo='".$_POST['job_card']."',PDate='".$_POST['bdate']."',ServiceName='".$checkbox[$i]."'";
$Rde=mysqli_query($conn,$tr);
}
}

if($_POST['payment_mode']=="Cash")
{
 $cash_acc="insert into account_cash set TransactionDate='".$_POST['bdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['rec_amt']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service',LedgerId='".$_POST['CLI']."'";
 $acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if(($_POST['payment_mode']!='Cash') && ($_POST['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['bdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Credit',Amount='".$_POST['rec_amt']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service',BankId='".$_POST['BankId']."',LedgerId='".$_POST['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }
$dgp="update s_add_package set AvailableAmount=AvailableAmount-'".$_POST['fromoffer_amt']."' where VehicleId='".$_POST['vehile_no']."'";
$rtmp=mysqli_query($conn,$dgp);


 $STemp="select * from a_final_bill_spare_temp where inv_no='".$_POST['inv_no']."' and job_card_no='".$_POST['job_card']."'"; 
$ESTemp=mysqli_query($conn,$STemp);
while($FESTemp=mysqli_fetch_array($ESTemp))
{
	
 $ssl="insert into a_final_bill_spare_details set bill_date='".$_POST['bdate']."',inv_no='".$_POST['inv_no']."',job_card_no='".$_POST['job_card']."',sname='".$FESTemp['sname']."',sqty='".$FESTemp['qty']."',smrp='".$FESTemp['amount']."',SpareFrom='".$FESTemp['SpareFrom']."'";
$Essl=mysqli_query($conn,$ssl);

 $echecks="Update item_stock set StockQuantity=StockQuantity-'".$FESTemp['qty']."' where ItemId='".$FESTemp['sname']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$echks=mysqli_query($conn,$echecks); 

$Dtemp="delete from a_final_bill_spare_temp where id='".$FESTemp['id']."'";
$EDtemp=mysqli_query($conn,$Dtemp);

}


if($_POST['payment_mode']!="Cash")
{
$sbo1="select * from cust_outstanding where cust_name='".strtoupper($_POST['cname'])."' order by id desc"; 
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


$tout=$FEsbo1['total_outstanding']+$_POST['bal_amt'];

//Out Standing Start
$tia=$_POST['bal_amt'];

//$pm2="select * from s_purchase_temp where inv_no='".$_POST['inv_no']."'";
//$Epm2=mysqli_query($pm2);
//$Fpm2=mysqli_fetch_array($Epm2);

$sbo="select * from cust_outstanding where cust_name='".strtoupper($_POST['cname'])."' order by id desc";
$Esbo=mysqli_query($conn,$sbo);
$FEsbo=mysqli_fetch_array($Esbo);

$ttlos=$FEsbo['total_outstanding']+$tia;

 $pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='$tia',invoice = '".strtoupper($_POST['inv_no'])."',paid_amt='0',p_date='".strtoupper($_POST['bdate'])."',balance_amt='$tia',total_outstanding='$ttlos'";  
$Epi1=mysqli_query($conn,$pi1);
//Outstandung End

//$pm1="insert into cust_outstanding set ad_amount='$eaa',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='".$_POST['bal_amt']."',invoice = '".$_POST['inv_no']."',paid_date='".$_POST['bdate']."',paid_amt='0',p_date='".$_POST['bdate']."',balance_amt='".$_POST['bal_amt']."',total_outstanding='$tout',payment_mode='Final Bill'";  
//$Epm1=mysqli_query($pm1); 

$cust="update a_customer set cus_out_amt='$ttlos' where id='".$_POST['cname']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
$custo=mysqli_query($conn,$cust);

}

if($s_names!='')
{
$inv=$_POST['inv_no'];
header("location:final_receipt_spare.php?inv_no=$inv");

}
else
{
$inv=$_POST['inv_no'];
header("location:final_receipt.php?inv_no=$inv");
}
?>