<?php
include("../../includes.php");

$pur="select * from s_quotation where q_no='".$_POST['q_no']."'";
$purc=mysqli_query($conn,$pur);
$purold=mysqli_num_rows($purc);

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["PurchasePhoto"]["name"]);
$extension = pathinfo($_FILES["PurchasePhoto"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
$upath=$target_dir . $nname.".".$extension;
$iupath=$nname.".".$extension;
move_uploaded_file($_FILES["PurchasePhoto"]["tmp_name"], $upath);

if($purold>'0')
{
	
    header("location:s_quotation.php?m=1");
}
	else
{
	$FrachiseeId=$_POST['FranchiseeId'];

   if(isset($_POST['Add']))
   {
	   $sgst=$_POST['gst']/2;
	    $cgst=$_POST['gst']/2;
		$igst='0';
	   $TotalGstPer=$_POST['gst'];
     $Rpm="insert into s_quotation_details_temp set q_no='".strtoupper($_POST['q_no'])."',supplier_name='".$_POST['supplier_name']."',pdate='".$_POST['pdate']."',outstand='".$_POST['out']."',gstin='".$_POST['gstin']."',spare_brand='".$_POST['brandid']."',spare_name='".$_POST['sid']."',spare_part_no='".$_POST['partno']."',unit='".$_POST['unitid']."',mrp='".$_POST['prate']."',discount='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',purchase_rate='".$_POST['purchase_rate']."',qty='".$_POST['qty']."',total='".$_POST['total']."',sgst='".$sgst."',cgst='".$cgst."',igst='".$igst."',gst_amt='".$_POST['gst_amt']."',TotalGstPer='$TotalGstPer',net_amount='".$_POST['net_amt']."'";
     $Erp=mysqli_query($conn,$Rpm);
     $q_no=$_POST['q_no'];
     header("location:s_quotation.php?q_no=$q_no");
   }
   else
   {
     $Epw1="select SUM(gst_amt) as gst_amt from s_quotation_details_temp where q_no='".$_POST['q_no']."'";
     $Tip1=mysqli_query($conn,$Epw1);
     $edi1=mysqli_fetch_array($Tip1);
		
     $pm2="insert into s_quotation set q_no='".$_POST['q_no']."',pdate='".$_POST['pdate']."',supplier_name='".$_POST['supplier_name']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',outstand='".$_POST['out']."',status='Active',purchase_details='Open',description='".$_POST['description']."',gstin='".$_POST['gstin']."',paymentoption='".$_POST['paymentoption']."',LedgerGroup='".$_POST['LedgerGroup']."',GstAmount='".$edi1['gst_amt']."',TotalPurchaseAmount='".$_POST['NetAmount']."',PaidAmount='".$_POST['PaidAmount']."',PendingAmount='".$_POST['PendingAmount']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',PurchasePhoto='$iupath'";
     $Epm2=mysqli_query($conn,$pm2);
     $Ed=mysqli_insert_id($conn);
	


     $Epw="select * from s_quotation_details_temp where q_no='".$_POST['q_no']."'";
     $Tip=mysqli_query($conn,$Epw);
     while($edi=mysqli_fetch_array($Tip))
        {
	      $Rcm="insert into s_quotation_details set q_no='$Ed',supplier_name='".$edi['supplier_name']."',spare_brand='".$edi['spare_brand']."',spare_name='".$edi['spare_name']."',spare_part_no='".$edi['spare_part_no']."',unit='".$edi['unit']."',mrp='".$edi['mrp']."',discount_per='".$edi['discount']."',discount_amt='".$edi['discount_amt']."',purchase_rate='".$edi['purchase_rate']."',qty='".$edi['qty']."',total='".$edi['total']."',sgst='".$edi['sgst']."',cgst='".$edi['cgst']."',igst='".$edi['igst']."',gst_amt='".$edi['gst_amt']."',total_amount='".$edi['net_amount']."',TotalGstPer='".$edi['TotalGstPer']."',status='Active',pdate='".$_POST['pdate']."',purchase_details='Open',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $Edm=mysqli_query($conn,$Rcm);

//Stock Update Start----
	
		   $tia=$tia+$edi['net_amount'];
		}
//Stock Update End----

//Outstanding Start---->
     
     
     $pm2="select * from s_quotation where q_no='".$_POST['q_no']."'";
     $Epm2=mysqli_query($conn,$pm2);
     $Fpm2=mysqli_fetch_array($Epm2);

     $sbo="select * from sup_outstanding where cust_name='".$Fpm2['supplier_name']."' order by id desc";
     $Esbo=mysqli_query($conn,$sbo);
     $FEsbo=mysqli_fetch_array($Esbo);
	
//$ba=$FEsb['balance_amt'];
//$oa=$FEsbo['total_outstanding'];

      $ttlos=$FEsbo['total_outstanding']+$_POST['PendingAmount'];
      $pi1="insert into sup_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$Fpm2['supplier_name']."',invoice_amt='$tia',invoice = '".strtoupper($_POST['q_no'])."',paid_amt='0',p_date='".strtoupper($Fpm2['pdate'])."',balance_amt='$ttlos',total_outstanding='$ttlos'";  
      $Epi1=mysqli_query($conn,$pi1);
//Outstanding End---->


     $stand1="select * from sup_outstanding where cust_name='".$Fpm2['supplier_name']."' order by id desc"; 
     $spt1=mysqli_query($conn,$stand1);
     $rep1=mysqli_fetch_array($spt1);

     $purchase="update m_supplier set  opening_balance='".$rep1['total_outstanding']."' where sid='".$rep1['cust_name']."'";  
     $pur=mysqli_query($conn,$purchase);

    // $purchase="update s_quotation set  total='$tia' where q_no='".$_POST['q_no']."'";  
     // $pur=mysqli_query($purchase);


$p="update job_card_no set qn=qn+1 where branch_id='".$_SESSION['BranchId']."'"; 
	$Ep=mysqli_query($conn,$p); 

    $pm3="delete from s_quotation_details_temp where q_no='".$_POST['q_no']."'";
    $Epm3=mysqli_query($conn,$pm3);
	
$q_no=$_POST['q_no'];
    header("location:s_quotation_receipt.php?q_no=$q_no");
    }
}
?>