<?php
session_start();
include("../../includes.php");
//include("redirect.php");

/* $pm="select * from a_voucher where v_id='".$_POST['v_id']."'"; 
$Epm=mysqli_query($pm);
$Fpm=mysqli_fetch_array($Epm);


 $n = mysqli_num_rows($Epm); 
if($n<1)
{
echo $pm1="insert into a_rec_voucher set v_id='".$_POST['v_id']."',v_date='".$_POST['v_date']."',cust_name='".strtoupper($_POST['cust_name'])."',out_amt='".strtoupper($_POST['out_amt'])."',out_inv='".$_POST['out_inv']."',amt='".$_POST['amount']."',trans_type='".$_POST['ttype']."',status='Active'";  
$Epm1=mysqli_query($pm1);

header("location:a_voucher_view.php?m=1");

}
else
{

header("location:a_voucher_view.php?m=2");
}
*/
$vid=$_POST['v_id'];
$vdate=$_POST['v_date'];
$cust_name=$_POST['cust_name'];
$out_amt=$_POST['out_amt'];
 $amount=$_POST['amount'];
$ttype=$_POST['ttype'];

$ino=$_POST['check_list'];

$dep1="select * from a_customer where id='".strtoupper($_POST['cust_name'])."'";
$dep=mysqli_query($conn,$dep1);
$result=mysqli_fetch_array($dep);

$saa="select ad_amount from cust_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
$Esaa=mysqli_query($conn,$saa);
$FEsaa=mysqli_fetch_array($Esaa);


 $gamount=$amount+$FEsaa['ad_amount'];

$ugamount=$gamount;


$ba=0;
$oa=0;
	
	
$N = count($ino);
    for($i=0; $i < $N; $i++)
    {
      //echo($ino[$i] . " ");
	if($_POST['ttype']=='Cash')
{
 $cash_acc="insert into account_cash set TransactionDate='".$vdate."',LedgerGroup='26',TransactionType='Credit',Amount='".$amount."',ReferenceNo='".$ino[$i]."',Reference1='".$_POST['v_id']."',TransactionFrom='cust_outstanding',Remarks='Recipt Voucher',LedgerId='".$result['LedgerId']."',franchisee_id='".$_POST['franchisee_id']."'";
 $acc_insert=mysqli_query($conn,$cash_acc); 
} 
 if($_POST['ttype']!='Cash')
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$vdate."',LedgerGroup='26',TransactionType='Credit',Amount='".$amount."',ReferenceNo='".$ino[$i]."',Reference1='".$_POST['v_id']."',TransactionFrom='cust_outstanding',Remarks='Recipt Voucher',BankId='".$_POST['BankId']."',LedgerId='".$result['LedgerId']."',franchisee_id='".$_POST['franchisee_id']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }
	  
	$sb="select * from cust_outstanding where invoice = '".$ino[$i]."'  order by id desc";
	$Esb=mysqli_query($conn,$sb);
	$FEsb=mysqli_fetch_array($Esb);
	
	
	$sbo="select * from cust_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
	$Esbo=mysqli_query($conn,$sbo);
	$FEsbo=mysqli_fetch_array($Esbo);
	
	$ba=$FEsb['balance_amt'];
	$oa=$FEsbo['total_outstanding'];
	
	
	if(($gamount>$ba)&&($ba>0))
	 {
		 $ub=$gamount-$ba;
		 $toa=$oa-$ba;
		 
		 $pm1="insert into cust_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='0',total_outstanding='".$toa."',payment_mode='".$_POST['ttype']."',Voucher_Id='".$_POST['v_id']."',franchisee_id='".$_POST['franchisee_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=$gamount-$ba;
	 }
	 else if($gamount<$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into cust_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',payment_mode='".$_POST['ttype']."',Voucher_Id='".$_POST['v_id']."',franchisee_id='".$_POST['franchisee_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		 
		// header("location:a_voucher.php");
	 }
	  else if($gamount==$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into cust_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',payment_mode='".$_POST['ttype']."',Voucher_Id='".$_POST['v_id']."',franchisee_id='".$_POST['franchisee_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		// header("location:a_voucher.php");
	 }
	  else if($gamount==0)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into cust_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',payment_mode='".$_POST['ttype']."',Voucher_Id='".$_POST['v_id']."',franchisee_id='".$_POST['franchisee_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		// header("location:a_voucher.php");
	 }
	
	  
	}
	
	
	$sbo1="select * from cust_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
$Esbo1=mysqli_query($conn,$sbo1);
$FEsbo1=mysqli_fetch_array($Esbo1);
$eaa=$FEsbo1['ad_amount'];	
	
	if($ugamount>$out_amt)
	{
	$adamount=$ugamount-$out_amt;
	}
	else
	{
	$adamount=0;
	}
	
	if($ugamount>$out_amt)
	{
			
		$ua="update cust_outstanding set ad_amount=$adamount where id='".$FEsbo1['id']."'";
		$Eua=mysqli_query($conn,$ua);
	}    
	
//if($N=='0')
//{
//	 $pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".strtoupper($_POST['cname'])."',invoice_amt='0',invoice = '0',paid_amt='0',p_date='".strtoupper($_POST['bdate'])."',balance_amt='$tia',total_outstanding='$ttlos'";  
//$Epi1=mysqli_query($pi1);
//}	
	  
 header("location:a_receipt_f.php");
?>