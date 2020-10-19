<?php
//session_start();
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);



   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


  $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


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

$dep1="select * from m_supplier where sid='".strtoupper($_POST['cust_name'])."'";
$dep=mysqli_query($conn,$dep1);
$result=mysqli_fetch_array($dep);

$saa="select ad_amount,invoice from sup_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
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
	  if($ttype=='Cash')
	  {
	 $cash_acc="insert into account_cash set TransactionDate='".$vdate."',LedgerGroup='23',TransactionType='Debit',Amount='".$amount."',ReferenceNo='".$FEsaa['invoice']."',TransactionFrom='sup_outstanding',Remarks='Payment Voucher',LedgerId='".$result['LedgerId']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
     $acc_insert=mysqli_query($conn,$cash_acc); 
	  }
	   if($ttype!='Cash')
	  {
		  $cash_acc="insert into account_bank set TransactionDate='".$vdate."',LedgerGroup='23',TransactionType='Debit',Amount='".$amount."',ReferenceNo='".$FEsaa['invoice']."',TransactionFrom='sup_outstanding',Remarks='Payment Voucher',BankId='".$_POST['BankId']."',LedgerId='".$result['LedgerId']."',Reference1='".$_POST['v_id']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
	  }
 
	$sb="select * from sup_outstanding where invoice = '".$ino[$i]."'  order by id desc";
	$Esb=mysqli_query($conn,$sb);
	$FEsb=mysqli_fetch_array($Esb);
	
	
	$sbo="select * from sup_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
	$Esbo=mysqli_query($conn,$sbo);
	$FEsbo=mysqli_fetch_array($Esbo);
	
	$ba=$FEsb['balance_amt'];
	$oa=$FEsbo['total_outstanding'];
	
	
	if(($gamount>$ba)&&($ba>0))
	 {
		 $ub=$gamount-$ba;
		 $toa=$oa-$ba;
		 
		 $pm1="insert into sup_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='0',total_outstanding='".$toa."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1); exit;
		 $gamount=$gamount-$ba;
		 
		 
		 
	 }
	 else if($gamount<$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into sup_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";  
		 $Epm1=mysqli_query($pm1);
		 $gamount=0;
		 
		// header("location:a_voucher.php");
	 }
	  else if($gamount==$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into sup_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		// header("location:a_voucher.php");
	 }
	  else if($gamount==0)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		 $pm1="insert into sup_outstanding set ad_amount='0',tran_amount='".$_POST['amount']."',cust_name='".strtoupper($_POST['cust_name'])."',invoice_amt='".$FEsb['invoice_amt']."',invoice = '".$ino[$i]."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',total_outstanding='".$toa."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";  
		 $Epm1=mysqli_query($conn,$pm1); 
		 $gamount=0;
		// header("location:a_voucher.php");
	 }
	
	  
	}
	
	
	$sbo1="select * from sup_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
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
		
		
		$ua="update sup_outstanding set ad_amount=$adamount where id='".$FEsbo1['id']."'";
		$Eua=mysqli_query($conn,$ua);
		}    
	  
	  
header("location:a_voucher_f.php");
?>