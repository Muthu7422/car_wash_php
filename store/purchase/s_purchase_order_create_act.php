<?php
include("../../includes.php");

$pur="select * from s_purchase where inv_no='".$_POST['inv_no']."' and  FranchiseeId='".$_SESSION['BranchId']."'";
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
	
    header("location:s_purchase_order_create.php?m=1");
}
	else
{
	$FrachiseeId=$_POST['FranchiseeId'];

   if(isset($_POST['Add']))
   {
	   
     
     $pm2="insert into s_purchase set inv_no='".$_POST['inv_no']."',pdate='".$_POST['pdate']."',supplier_name='".$_POST['supplier_name']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',outstand='".$_POST['out']."',status='Active',purchase_details='Open',description='".$_POST['description']."',gstin='".$_POST['gstin']."',paymentoption='".$_POST['paymentoption']."',LedgerGroup='".$_POST['LedgerGroup']."',GstAmount='".$edi1['gst_amt']."',TotalPurchaseAmount='".$_POST['NetAmount']."',PaidAmount='".$_POST['PaidAmount']."',PendingAmount='".$_POST['PendingAmount']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',PurchasePhoto='$iupath'";
     $Epm2=mysqli_query($conn,$pm2);
     $Ed=mysqli_insert_id($conn);
	
//purchase entry details start
for($i=1;$i<9;$i++)
{
	if($_POST['status'.$i]=='Complete')
	{
		 // $Epw0="select * from s_purchase_order where id='".$_POST['PurchaseOrderNo']."'";
     // $Tip0=mysqli_query($conn,$Epw);
     // while($edi0=mysqli_fetch_array($Tip0)){
		   $sgst=$_POST['gst'.$i]/2;
	    $cgst=$_POST['gst'.$i]/2;
		$igst='0';
		
	  $Epw="select * from s_purchase_order_details where id='".$_POST['POID'.$i]."'";
     $Tip=mysqli_query($conn,$Epw);
     while($edi=mysqli_fetch_array($Tip))
        {
	       $Rcm="insert into s_purchase_details set inv_no='$Ed',supplier_name='".$edi['supplier_name']."',spare_brand='".$edi['spare_brand']."',spare_name='".$edi['spare_name']."',spare_part_no='".$edi['spare_part_no']."',hsn_code='".$edi['hsn_code']."',unit='".$edi['unit']."',discount_per='".$_POST['discount_per'.$i]."',discount_amt='".$_POST['discount_amt2'.$i]."',purchase_rate='".$_POST['purchase_rate'.$i]."',qty='".$_POST['qty'.$i]."',total='".$_POST['total'.$i]."',sgst='$sgst',cgst='$cgst',igst='$igst',gst_amt='".$_POST['gst_amt'.$i]."',total_amount='".$_POST['net_amt'.$i]."',TotalGstPer='".$_POST['gst'.$i]."',status='Active',pdate='".$_POST['pdate']."',purchase_details='Open',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $Edm=mysqli_query($conn,$Rcm);

//Stock Update Start----
		 $echeck1="select * from item_stock where ItemId='".$edi['spare_name']."' and FranchiseeId='".$var['branch_id']."' and Uom='".$edi['unit']."'"; 
         $echk1=mysqli_query($conn,$echeck1);
         $ecount1=mysqli_fetch_array($echk1); 
		 $nr=mysqli_num_rows($echk1);	
		 if($nr>'0')
		   {
			   $echecks="Update item_stock set StockQuantity=StockQuantity+'".$_POST['qty'.$i]."',hsn_code='".$edi['hsn_code']."' where ItemId='".$edi['spare_name']."' and FranchiseeId='".$var['branch_id']."' and Uom='".$edi['unit']."'"; 
			   $echks=mysqli_query($conn,$echecks);
		   }
		   if($nr=='0')
		   {
			    $stock="insert into item_stock set FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',ItemId='".$edi['spare_name']."',StockQuantity='".$_POST['qty'.$i]."',Uom='".$edi['unit']."',hsn_code='".$edi['hsn_code']."'";
			    $stocks=mysqli_query($conn,$stock); 
		   }
		   //$tia=$tia+$edi['net_amt'];
		}
		$test="update s_purchase_order_details set purchase_status='".$_POST['status'.$i]."' where id='".$_POST['POID'.$i]."'";
		$test1=mysqli_query($conn,$test);
		//}
//Stock Update End----
	}
}
	//purchase entry details end
if($_POST['paymentoption']=='Cash')
	{
	    $acc1="select * from account_cash order by id desc";
		$sccq1=mysqli_query($conn,$acc1);
		$acf1=mysqli_fetch_array($sccq1);
					
		$open=$acf1['cash_bal']+$_POST['PaidAmount'];
        $ica="insert into account_cash set Remarks='".$_POST['description']."',TransactionDate='".$_POST['pdate']."',LedgerGroup='".$_POST['LedgerGroup']."',cash_bal='$open',TransactionType='Credit',Amount='".$_POST['PendingAmount']."',ReferenceNo='$Ed',TransactionFrom='Purchase',LedgerId='23'";
        $Eica=mysqli_query($conn,$ica);
	}
	   
	   if($_POST['paymentoption']=='Bank')
{
    $bnk="select * from  a_bank_acc where Id='".$_POST['BankNameT']."'";
	$bnkq=mysqli_query($conn,$bnk);
	$bnkf=mysqli_fetch_array($bnkq);
					
					 $acc="select * from account_bank where bankId='".$_POST['BankNameT']."'order by Id desc";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
				$open1=$acf['bank_bal']+$_POST['PaidAmount'];

	
	$cash_acc="insert into account_bank set LedgerGroup='".$_POST['LedgerGroup']."',TransactionDate='".$_POST['pdate']."',bank_bal='$open1',Amount='".$_POST['PendingAmount']."',ReferenceNo='$Ed',TransactionFrom='Purchase',BankId='".$bnkf['Id']."',LedgerId='23'";
	$acc_insert=mysqli_query($conn,$cash_acc); 
	
	
}   
 if(($_POST['paymentoption']!='Cash') && ($_POST['paymentoption']!='Bank') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['pdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['PaidAmount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase',BankId='".$_POST['BankId']."',LedgerId='".$_POST['SLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

//Outstanding Start---->
     
     
     $pm2="select * from s_purchase where inv_no='".$_POST['inv_no']."'";
     $Epm2=mysqli_query($conn,$pm2);
     $Fpm2=mysqli_fetch_array($Epm2);

     $sbo="select * from sup_outstanding where cust_name='".$Fpm2['supplier_name']."' order by id desc";
     $Esbo=mysqli_query($conn,$sbo);
     $FEsbo=mysqli_fetch_array($Esbo);
	
//$ba=$FEsb['balance_amt'];
//$oa=$FEsbo['total_outstanding'];

      $ttlos=$FEsbo['total_outstanding']+$_POST['PendingAmount'];
      $pi1="insert into sup_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$Fpm2['supplier_name']."',invoice_amt='".$_POST['NetAmount']."',invoice = '".strtoupper($_POST['inv_no'])."',paid_amt='0',p_date='".strtoupper($Fpm2['pdate'])."',balance_amt='$ttlos',total_outstanding='$ttlos'";  
      $Epi1=mysqli_query($conn,$pi1);
//Outstanding End---->


     $stand1="select * from sup_outstanding where cust_name='".$Fpm2['supplier_name']."' order by id desc"; 
     $spt1=mysqli_query($conn,$stand1);
     $rep1=mysqli_fetch_array($spt1);

     $purchase="update m_supplier set  opening_balance='".$rep1['total_outstanding']."' where sid='".$rep1['cust_name']."'";  
     $pur=mysqli_query($conn,$purchase);
  
    header("location:s_purchase_view.php");
    }
}
?>