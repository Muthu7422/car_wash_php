<?php
include("../../includes.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$sgst=$_POST['gst']/2;
$cgst=$_POST['gst']/2;
 $pr="insert into a_final_bill set bill_date='".$_POST['bdate']."',inv_no='".$_POST['inv_no']."',financial_year='".$_SESSION['FinancialYear']."',job_card_no='".$_POST['job_card']."',JobcardId='".$_POST['JobcardId']."',cname='".$_POST['cname']."',cmobile='".$_POST['mobile']."',caddrs='".$_POST['address']."',cvehile='".$_POST['vehile_no']."',remarks='".$_POST['remarks']."',TotalServiceAmount='".$_POST['ServiceAmount']."',gst='".$_POST['gst']."',gst_amt='".$_POST['gst_amt']."',ServiceAmountAfterGst='".$_POST['ServiceAmountAfterGst']."',discount='".$_POST['DiscountAmount']."',paid_amt='".$_POST['PaidAdvanceAmount']."',ServiceBalanceAmount='".$_POST['ServiceBalanceAmount']."',SpareAmt='".$_POST['TotalSpareAmount']."',OutSourcesAmt='".$_POST['TotalPaintingAmount']."',Total_bill_Amount='".$_POST['InvoiceBillAmount']."',rec_amt='".$_POST['ReceivableAmount']."',bal_amt='".$_POST['BalanceAmount']."',ptype='".$_POST['PaymentMode']."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',LedgerGroup='".$_POST['LedgerGroup']."',LedgerId='".$_POST['CLI']."'";
$Epr=mysqli_query($conn,$pr);  
$id=mysqli_insert_id($conn);

if($_POST['payment_mode']=="Cash")
{
	
	        $mob="select * from a_customer where mobile1='".trim($_POST['mobile'])."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
            $cash_acc="insert into account_cash set TransactionDate='".$_POST['bdate']."',LedgerGroup='62',TransactionType='Credit',Amount='".$_POST['ReceivableAmount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service Amount from Finall Bill',LedgerId='".$mobil['LedgerId']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
            $acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if($_POST['payment_mode']!='Cash')
	   {
		    $mob="select * from a_customer where mobile1='".trim($_POST['mobile'])."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
	        $cash_acc1="insert into account_bank set TransactionDate='".$_POST['bdate']."',LedgerGroup='62',TransactionType='Credit',Amount='".$_POST['ReceivableAmount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='a_final_bill',Remarks='Service Amount from Finall Bill',BankId='".$_POST['BankId']."',LedgerId='".$mobil['LedgerId']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	        $acc_insert1=mysqli_query($conn,$cash_acc1); 
       }



$STemp="select * from a_final_bill_spare_temp where inv_no='".$_POST['inv_no']."' and job_card_no='".$_POST['job_card']."'"; 
$ESTemp=mysqli_query($conn,$STemp);
while($FESTemp=mysqli_fetch_array($ESTemp))
{
$ssl="insert into a_final_bill_spare_details set bill_date='".$_POST['bdate']."',inv_no='".$_POST['inv_no']."',job_card_no='".$_POST['job_card']."',sname='".$FESTemp['sname']."',sqty='".$FESTemp['qty']."',smrp='".$FESTemp['amount']."',SpareFrom='".$FESTemp['SpareFrom']."'";
$Essl=mysqli_query($conn,$ssl);

$echecks="Update item_stock set StockQuantity=StockQuantity-'".$FESTemp['qty']."' where ItemId='".$FESTemp['sname']."' and FranchiseeId='".$_SESSION['BranchId']."'"; 
$echks=mysqli_query($conn,$echecks); 

$Dtemp="delete from a_final_bill_spare_temp where id='".$FESTemp['id']."'";
$EDtemp=mysqli_query($conn,$Dtemp);

}

$jr="SELECT sum(q1+q2+q3+q4+q5) as fr FROM s_job_card where job_card_no='".$_POST['job_card']."'";
$Ejr=mysqli_query($conn,$jr);
$FEjr=mysqli_fetch_array($Ejr);
$fr=$FEjr['fr'];

$ch = curl_init();

$a=$_POST['InvoiceBillAmount'];
$m=$_POST['mobile'];
$receipientno=$m;

if($fr>'7')
{
    $message="Dear Customer , Thank you for your qualitative feedback.You have provided us a rating ".$fr."/10 Looking forward with pleasure to seeing you again.Kind Regards,Protouch Management
";
}
else
{
	    $message="Dear Customer , Thank you for your qualitative feedback.You have provided us a rating ".$fr."/10 our management will contact you shortly to resolve the issue within 24 hours.Kind Regards,Protouch Management";
}
// SMS content Start //
// $id=$_REQUEST['JobcardId'];
// $pin="select * from s_job_card where id='".$_POST['JobcardId']."'";
// $pin_query=mysqli_query($conn,$pin);
// $pin_fetch=mysqli_fetch_array($pin_query);

    // $ss1="select * from a_customer where id='".$pin_fetch['customer_id']."'";
	// $Ess1=mysqli_query($conn,$ss1);
	// $FEss1=mysqli_fetch_array($Ess1);



 $ct="update s_job_card set jcard_status='Close' where id='".$_REQUEST['JobcardId']."'"; 
 $Ect=mysqli_query($conn,$ct);  


// $ch = curl_init();
// $v=$pin_fetch['vehicle_no'];
// $cust=$FEss1['cust_name'];
// $a=$pin_fetch['IncludeGst'];
// $m=$pin_fetch['smobile'];
// $receipientno=$m;

 // $message="Dear ".$cust.", Thanks for visiting Protouch.Please Click here to rate our services.http://protouch.vertexsolution.co.in/feedback.php?id=".$id;

 
// $userid="protouch";
// $pwd="welcome123";
// $senderid="protch";
// $channel="Trans";
// $DCS="0";
// $flashsms="0";
// $contacts="$m";
// $route="6";
// $content =  'user='.rawurlencode($userid). 
                // '&password='.rawurlencode($pwd). 
				// '&senderid='.rawurlencode($senderid).
				// '&channel='.rawurlencode($channel).
				// '&DCS='.rawurlencode($DCS).
				// '&flashsms='.rawurlencode($flashsms).				
				// '&number='.rawurlencode($contacts).
				// '&text='.rawurlencode($message).                
                // '&route='.rawurlencode($route); 
 // $url="http://indiasmstalks.com/api/mt/SendSMS?$content";
// $ch = curl_init($url);
 // curl_exec($ch);
// curl_close($ch);


// SMS content END //

// if($s_names!='')
// {
// $inv=$_POST['inv_no'];
// $JobcardId=$_POST['JobcardId'];
// header("location:../../services/job_card/s_jobcard_view_close.php");

// }
// else
// {
	
	
	//Outstanding Start---->
	
		 $p="select * from job_card_no where id='1' ";
             $Ep=mysqli_query($conn,$p);
             $Fp=mysqli_fetch_array($Ep);
     
     
     $pm2="select * from sales_order where inv_no='".$_POST['inv_no']."'";
     $Epm2=mysqli_query($conn,$pm2);
     $Fpm2=mysqli_fetch_array($Epm2);

     $sbo="select * from cust_outstanding where cust_name='".$_POST['cname']."' ";
     $Esbo=mysqli_query($conn,$sbo);
     $FEsbo=mysqli_fetch_array($Esbo);
	
//$ba=$FEsb['balance_amt'];
//$oa=$FEsbo['total_outstanding'];

      $ttlos=$FEsbo['total_outstanding']+$_POST['BalanceAmount'];
      $pi1="insert into cust_outstanding set Voucher_Id='".$_POST['Voucher_Id']."',ad_amount='".$_POST['PaidAdvanceAmount']."',tran_amount='0',cust_name='".$_POST['cname']."',invoice_amt='".$_POST['ServiceAmountAfterGst']."',invoice = '".strtoupper($_POST['inv_no'])."',paid_amt='".$_POST['PaidAdvanceAmount']."',p_date='".strtoupper($_POST['bdate'])."',balance_amt='".$_POST['ServiceBalanceAmount']."',total_outstanding='$ttlos',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";  
      $Epi1=mysqli_query($conn,$pi1);
//Outstanding End---->


     // $stand1="select * from cust_outstanding where cust_name='".$Fpm2['supplier_name']."' "; 
     // $spt1=mysqli_query($conn,$stand1);
     // $rep1=mysqli_fetch_array($spt1);

     // $purchase="update m_supplier set  opening_balance='".$rep1['total_outstanding']."' where sid='".$rep1['cust_name']."'";  
     // $pur=mysqli_query($conn,$purchase);
	
	
	
$inv=$_POST['inv_no'];
$JobcardId=$_POST['JobcardId'];
 header("location:final_receipt.php?inv_no=$inv");
//}
?>