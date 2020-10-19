<?php
session_start();
include("../../includes.php");
//include("redirect.php");

$vid=$_POST['Voucher_Id'];
$vdate=$_POST['v_date'];
$cust_id=$_POST['cust_id'];

$out_amt=$_POST['out_amt'];
$out_amt_ad=$_POST['out_amt_ad'];
 $amount=$_POST['amount'];
$jstatus=$_POST['jstatus'];
$aid=$_POST['aid'];

$ino=$_POST['check_list'];

$dep1="select * from a_customer where id='".strtoupper($_POST['cust_id'])."'";
$dep=mysqli_query($conn,$dep1);
$result=mysqli_fetch_array($dep);

$saa="select ad_amount from cust_outstanding where cust_id='".strtoupper($_POST['cust_id'])."' order by id desc";
$Esaa=mysqli_query($conn,$saa);
while($FEsaa=mysqli_fetch_array($Esaa)){


 $gamount=$amount;

$ugamount=$gamount;


$ba=0;
$oa=0;
	
	
$N = count($ino);
    for($i=0; $i < $N; $i++)
    {
      //echo($ino[$i] . " ");
	if($_POST['jstatus']=='Cash')
	{
	    $acc1="select * from account_cash order by id desc";
		$sccq1=mysqli_query($conn,$acc1);
		$acf1=mysqli_fetch_array($sccq1);
					
		$open=$acf1['cash_bal']+$_POST['amount'];
        $ica="insert into account_cash set Remarks='".$_POST['description']."',TransactionDate='".$_POST['pdate']."',LedgerGroup='".$_POST['LedgerGroup']."',cash_bal='$open',TransactionType='Debit',Amount='".$_POST['BCashS']."',UserId='".$_SESSION['UserId']."',ReferenceNo='$Ed',TransactionFrom='Purchase'";
        $Eica=mysqli_query($conn,$ica);
	}
	   
	   if($_POST['jstatus']=='Bank')
{
    $bnk="select * from  a_bank_acc where Id='".$_POST['BankNameT']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
					
					 $acc="select * from account_bank where bankId='".$_POST['BankNameT']."'order by Id desc";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
				$open1=$acf['bank_bal']+$_POST['amount'];

	
	$cash_acc="insert into account_bank set LedgerGroup='".$_POST['LedgerGroup']."',ChequeNumber='".$_POST['ChequeNumber']."',UserId='".$_SESSION['UserId']."',bank_bal='$open1',Amount='".$_POST['BCashS']."',ReferenceNo='".$id."',TransactionFrom='Purchase',Remarks='Expenses',BankId='".$bnkf['Id']."',LedgerId='".$bnkf['LedgerId']."'";
	$acc_insert=mysqli_query($conn,$cash_acc); 
}

	  
 $sb="select * from cust_outstanding where invoice = '".$ino[$i]."'  order by id desc";
	$Esb=mysqli_query($conn,$sb);
	$FEsb=mysqli_fetch_array($Esb);
	
	
	 $sbo="select * from cust_outstanding where cust_id='".$_POST['cust_id']."' AND invoice = '".$ino[$i]."' order by id desc";
	$Esbo=mysqli_query($conn,$sbo);
	$FEsbo=mysqli_fetch_array($Esbo);
	
 $poi="select * from total_outstanding_taiba where cust_id='".$FEsbo['cust_id']."'";
	$tyu=mysqli_query($conn,$poi);
	$uoi=mysqli_fetch_array($tyu);
	
	$ba=$FEsb['balance_amt'];
	$oa=$uoi['total_out'];
	//$ad=$FEsbo['ad_amount'];
	$aid=$FEsbo['id'];
	
	
	if(($gamount>$ba)&&($ba>0))
	 {
		 $ub=$gamount-$ba;
		 $toa=$oa-$gamount;
		 
		    $is="update total_outstanding_taiba set total_out='".$toa."' where id='".$uoi['id']."'";
			$isq=mysqli_query($conn,$is);  
			
		  $pm1="update cust_outstanding set remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',tran_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='0',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."' where id='".$aid."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=$gamount-$ba;
	 }
	 else if($gamount<$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		        
				 $is="update total_outstanding_taiba set total_out='".$toa."' where id='".$uoi['id']."'";
			$isq=mysqli_query($conn,$is);
			
		   $pm1="update cust_outstanding set remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',tran_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."' where id='".$aid."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		 
		///header("location:a_receipt_f.php");
	 }
	 else if($gamount==$ba)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		  
		   $is="update total_outstanding_taiba set total_out='".$toa."' where id='".$uoi['id']."'";
			$isq=mysqli_query($conn,$is);
			
	  $pm1="update cust_outstanding set remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',tran_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."' where id='".$aid."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		//header("location:a_receipt_f.php");
	 } 
	  else if($gamount==0)
	 {
		 $ub=$ba-$gamount;
		 $toa=$oa-$gamount;
		 
		   $is="update total_outstanding_taiba set total_out='".$toa."' where id='".$uoi['id']."'";
			$isq=mysqli_query($conn,$is);
			
		  $pm1="update cust_outstanding set remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',tran_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$ba."',paid_date='$vdate',balance_amt='".$ub."',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."' where id='".$aid."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $gamount=0;
		//header("location:a_receipt_f.php");
	 }	 
	   
}
}	
	
	$sbo1="select * from cust_outstanding where cust_id='".strtoupper($_POST['cust_id'])."' order by id desc";
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
			
		 $ua="update cust_outstanding set ad_amount='".$eaa."' where id='".$FEsbo1['id']."'";
		$Eua=mysqli_query($conn,$ua);
	}    
	
$p="update job_card_no set rv=rv+1 where id='1'";
	$Ep=mysqli_query($conn,$p); 
	 
	  
 header("location:a_receipt_f.php");
?>