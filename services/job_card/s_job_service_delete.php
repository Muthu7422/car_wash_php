<?php
include("../../dbinfoi.php");

$job_card_no=$_REQUEST['job_card_no'];
$date=date("Y-m-d");
 $abcd="select * from s_job_card where job_card_no='$job_card_no'"; 
$dcmd=mysqli_query($conn,$abcd);
$scpd=mysqli_fetch_array($dcmd);


 $mob="select * from a_customer where id='".trim($scpd['customer_id'])."'"; 
$mobi=mysqli_query($conn,$mob);
$mobil=mysqli_fetch_array($mobi);

    $accash="select * from  account_cash WHERE ReferenceNo='$job_card_no'"; 
	$cashq=mysqli_query($conn,$accash);
	$cashf=mysqli_fetch_array($cashq);
	if($cashf['ReferenceNo']=='$job_card_no')
	{
	
    $cash_acc="insert into account_cash set TransactionDate='".$scpd['jdate']."',LedgerGroup='33',TransactionType='Debit',Amount='".$scpd['PaidAmount']."',ReferenceNo='".$scpd['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance Cancel',LedgerId='".$mobil['LedgerId']."'";
    $acc_insert=mysqli_query($conn,$cash_acc); 
	}
	else
	{
		 $bank_acc="insert into account_bank set TransactionDate='$date',LedgerGroup='33',TransactionType='Debit',Amount='".$scpd['PaidAmount']."',ReferenceNo='".$scpd['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance Cancel',BankId='0',LedgerId='".$mobil['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$bank_acc); 
		
	}



 $ct="delete from s_job_card_pdetails where job_card_no='".$scpd['id']."'";
$Ect=mysqli_query($conn,$ct);

 $ct="delete from s_job_card_package_service_details where JobcardId=='".$scpd['id']."'"; 
$Ect=mysqli_query($conn,$ct);

 $ct="delete from s_job_card_sdetails where job_card_no='".$scpd['id']."'"; 
$Ect=mysqli_query($conn,$ct);

$ct="delete from s_job_card where id='".$scpd['id']."'"; 
$Ect=mysqli_query($conn,$ct);

header("location:s_jobcard_view.php");
?>