<?php
// session_start();
include("../../includes.php");
include("../../dbinfoi.php");

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

/* $dep1="select * from a_customer where id='".strtoupper($_POST['cust_id'])."'";
$dep=mysqli_query($conn,$dep1);
$result=mysqli_fetch_array($dep);

$saa="select ad_amount from cust_outstanding where cust_id='".strtoupper($_POST['cust_id'])."' order by id desc";
$Esaa=mysqli_query($conn,$saa);
while($FEsaa=mysqli_fetch_array($Esaa)){ */


  $gamount=$amount;

$ugamount=$gamount;


$ba=0;
$oa=0;
	
	
 $N = count($ino);
    for($i=0; $i < $N; $i++)
    {
      //echo($ino[$i] . " ");


	  
  $sb="select * from cust_outstanding where invoice = '".$ino[$i]."'  order by id desc";
	$Esb=mysqli_query($conn,$sb);
	$FEsb=mysqli_fetch_array($Esb);
	
	
	  $sbo="select * from cust_outstanding where cust_id='".$_POST['cust_id']."' AND invoice = '".$ino[$i]."' order by id desc";
	$Esbo=mysqli_query($conn,$sbo);
	$FEsbo=mysqli_fetch_array($Esbo);
	
 echo $poi="select * from cust_outstanding where cust_name='".$_POST['cust_id']."'";
	$tyu=mysqli_query($conn,$poi);
	$uoi=mysqli_fetch_array($tyu);
	
	$ba=$FEsb['total_outstanding'];
echo	$oa=$uoi['total_outstanding'];
	//$ad=$FEsbo['ad_amount'];
	$aid=$FEsbo['id'];
	
	
	
		  $ub=$ba-$gamount;
	echo  $toa=$FEsb['total_outstanding']-$_POST['amount'];
		 
		echo     $is="update cust_outstanding set total_outstanding='".$toa."' where invoice ='".$ino[$i]."'";
			$isq=mysqli_query($conn,$is);  
			
		  $pm1="update cust_outstanding set remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$_POST['amount']."',paid_date='$vdate',balance_amt='".$ub."',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."',Rtype='Receipt' where invoice='".$ino[$i]."' and franchisee_id='".$_SESSION['BranchId']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		
	  $pm1="insert into receipt_voucher set sid='".$FEsbo['id']."',invoice='".$FEsb['invoice']."',total_outstanding='$ub',remarks='".$_POST['remarks']."',ad_amount='".$_POST['amount']."',cust_id='".strtoupper($_POST['cust_id'])."',invoice_amt='".$FEsb['invoice_amt']."',paid_amt='".$_POST['amount']."',paid_date='$vdate',balance_amt='".$ub."',payment_mode='".$_POST['jstatus']."',Voucher_Id='".$_POST['Voucher_Id']."',Rtype='Receipt Voucher',franchisee_id='".$_SESSION['BranchId']."'";  
		 $Epm1=mysqli_query($conn,$pm1);
		 $iid=mysqli_insert_id($conn);
		 
	  
	  	if($_POST['jstatus']=='Cash')
	{
		 
	 	$acc2="select * from a_customer where id='".$_POST['cust_id']."'";
		$sccq2=mysqli_query($conn,$acc2);
		$acf2=mysqli_fetch_array($sccq2);
		   
	    $acc1="select * from account_cash order by id desc";
		$sccq1=mysqli_query($conn,$acc1);
		$acf1=mysqli_fetch_array($sccq1);
					
		$open=$acf1['cash_bal']+$_POST['amount'];
        $ica="insert into account_cash set cash_bal='$open',TransactionType='Debit',Amount='".$_POST['BCash']."',UserId='".$_SESSION['UserId']."',TransactionFrom='Receipt voucher',franchisee_id='".$_SESSION['BranchId']."'";
        $Eica=mysqli_query($conn,$ica);
		
		 $icaa="insert into account_cash_bank set amount='".$_POST['amount']."',date='$vdate',ledger_group_id='5',ledger_id='5',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
        $Eicaa=mysqli_query($conn,$icaa);
		
		$icaab="insert into account_cash_bank set amount='$ub',date='$vdate',ledger_group_id='51',ledger_id='51',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
        $Eicaab=mysqli_query($conn,$icaab);
		
		 $icaac="insert into account_cash_bank set amount='".$_POST['amount']."',date='$vdate',ledger_group_id='24',ledger_id='".$acf2['LedgerId']."',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
        $Eicaac=mysqli_query($conn,$icaac);
		
		
	}
	   
	   if($_POST['jstatus']=='Bank')
{
	
	   $acc2="select * from a_customer where id='".$_POST['cust_id']."'";
		$sccq2=mysqli_query($conn,$acc2);
		$acf2=mysqli_fetch_array($sccq2);
		
    $bnk="select * from  a_bank_acc where Id='".$_POST['BankNameT']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
					
					 $acc="select * from account_bank where bankId='".$_POST['BankNameT']."'order by Id desc";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
				$open1=$acf['bank_bal']+$_POST['amount'];

	
	$cash_acc="insert into account_bank set LedgerGroup='".$_POST['LedgerGroup']."',ChequeNumber='".$_POST['ChequeNumber']."',UserId='".$_SESSION['UserId']."',bank_bal='$open1',Amount='".$_POST['BCash']."',ReferenceNo='".$id."',TransactionFrom='Purchase',Remarks='Expenses',BankId='".$bnkf['Id']."',LedgerId='".$bnkf['LedgerId']."',franchisee_id='".$_SESSION['BranchId']."'";
	$acc_insert=mysqli_query($conn,$cash_acc); 
	
	$icaa="insert into account_cash_bank set amount='".$_POST['amount']."',date='$vdate',ledger_group_id='1',ledger_id='1',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
    $Eicaa=mysqli_query($conn,$icaa);
	
	$icaab="insert into account_cash_bank set amount='$ub',date='$vdate',ledger_group_id='51',ledger_id='51',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
    $Eicaab=mysqli_query($conn,$icaab);
	
	$icaac="insert into account_cash_bank set amount='".$_POST['amount']."',date='$vdate',ledger_group_id='24',ledger_id='".$acf2['LedgerId']."',payment_mode='".$_POST['jstatus']."',type='Credit',Narration='Receipt voucher',table_id='$iid',franchisee_id='".$_SESSION['BranchId']."'";
    $Eicaac=mysqli_query($conn,$icaac);
}
	 
}
//}	
	
	$sbo1="select * from receipt_voucher where cust_id='".strtoupper($_POST['cust_id'])."' order by id desc";
$Esbo1=mysqli_query($conn,$sbo1);
$FEsbo1=mysqli_fetch_array($Esbo1);
			
		 $ica1="insert into sales_receipt_transaction set vid='".$FEsbo1['id']."',BCashP='".$FEsbo1['balance_amt']."',cid='".$FEsbo1['cust_id']."',invoice_no='".$FEsbo1['invoice']."',total_amount='".$FEsbo1['invoice_amt']."',cdate='".$FEsbo1['paid_date']."',BCashS='".$FEsbo1['paid_amt']."',vtype='Receipt Voucher',status='Active',franchisee_id='".$_SESSION['BranchId']."'";
	  $Eica1=mysqli_query($conn,$ica1);
	   
	
$p="update job_card_no set rv=rv+1 where branch_id='".$_SESSION['BranchId']."'"; 
	$Ep=mysqli_query($conn,$p); 
	 
	  
 header("location:receipt_voucher_view.php");
?>