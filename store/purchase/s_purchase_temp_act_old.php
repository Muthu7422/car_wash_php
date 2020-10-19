<?php
include("../../includes.php");

$pur="select * from s_purchase where inv_no='".$_POST['inv_no']."'";
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
	
    header("location:s_purchase.php?m=1");
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
     $Rpm="insert into s_purchase_details_temp set inv_no='".strtoupper($_POST['inv_no'])."',supplier_name='".$_POST['supplier_name']."',pdate='".$_POST['pdate']."',outstand='".$_POST['out']."',gstin='".$_POST['gstin']."',spare_brand='".$_POST['brandid']."',spare_name='".$_POST['sid']."',spare_part_no='".$_POST['partno']."',unit='".$_POST['unitid']."',mrp='".$_POST['prate']."',discount='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',purchase_rate='".$_POST['purchase_rate']."',qty='".$_POST['qty']."',total='".$_POST['total']."',sgst='".$sgst."',cgst='".$cgst."',igst='".$igst."',gst_amt='".$_POST['gst_amt']."',TotalGstPer='$TotalGstPer',net_amount='".$_POST['net_amt']."'";
     $Erp=mysqli_query($conn,$Rpm);
     $inv_no=$_POST['inv_no'];
     header("location:s_purchase.php?inv_no=$inv_no");
   }
   else
   {
     $Epw1="select SUM(gst_amt) as gst_amt from s_purchase_details_temp where inv_no='".$_POST['inv_no']."'";
     $Tip1=mysqli_query($conn,$Epw1);
     $edi1=mysqli_fetch_array($Tip1);
		
     $pm2="insert into s_purchase set inv_no='".$_POST['inv_no']."',pdate='".$_POST['pdate']."',supplier_name='".$_POST['supplier_name']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',outstand='".$_POST['out']."',status='Active',purchase_details='Open',description='".$_POST['description']."',gstin='".$_POST['gstin']."',paymentoption='".$_POST['paymentoption']."',LedgerGroup='".$_POST['LedgerGroup']."',GstAmount='".$edi1['gst_amt']."',TotalPurchaseAmount='".$_POST['NetAmount']."',PaidAmount='".$_POST['PaidAmount']."',PendingAmount='".$_POST['PendingAmount']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',PurchasePhoto='$iupath'";
     $Epm2=mysqli_query($conn,$pm2);
     $Ed=mysqli_insert_id($conn);
	
if($_POST['paymentoption']=='Cash')
	{
	    $acc1="select * from account_cash order by id desc";
		$sccq1=mysqli_query($conn,$acc1);
		$acf1=mysqli_fetch_array($sccq1);
					
		$open=$acf1['cash_bal']+$_POST['PaidAmount'];
        $ica="insert into account_cash set Remarks='".$_POST['description']."',TransactionDate='".$_POST['pdate']."',LedgerGroup='".$_POST['LedgerGroup']."',cash_bal='$open',TransactionType='Credit',Amount='".$_POST['PendingAmount']."',ReferenceNo='$Ed',TransactionFrom='Purchase',LedgerId='23'";
        $Eica=mysqli_query($conn,$ica);
		
		
					 $bnk="select * from  m_supplier where sid='".$_POST['supplier_name']."'";
	         $bnkq=mysqli_query($conn,$bnk);
	         $ledid=mysqli_fetch_array($bnkq);
					
					 $icaa8="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='21',ledger_id='".$ledid['LedgerId']."',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
                     $Eicaa8=mysqli_query($conn,$icaa8);
					 
					 $icaa="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='5',ledger_id='5',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa=mysqli_query($conn,$icaa);
	
	    $icaa6="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='21',ledger_id='21',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa6=mysqli_query($conn,$icaa6);
		
		$icaa7="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='27',ledger_id='27',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa7=mysqli_query($conn,$icaa7);
		
		$icaa9="insert into account_cash_bank set amount='".$edi1['gst_amt']."',date='".$_POST['pdate']."',ledger_group_id='61',ledger_id='91',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa9=mysqli_query($conn,$icaa9);
		
			$icaa12="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
		
		
		$icaa12="insert into account_cash_bank set amount='".$_POST['PendingAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
		
			$icaa12="insert into account_cash_bank set amount='".$_POST['PaidAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Account Payable',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
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
	
						 $bnk="select * from  m_supplier where sid='".$_POST['supplier_name']."'";
	         $bnkq=mysqli_query($conn,$bnk);
	         $ledid=mysqli_fetch_array($bnkq);
					
					 $icaa8="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='21',ledger_id='".$ledid['LedgerId']."',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
                     $Eicaa8=mysqli_query($conn,$icaa8);
				
		    $icaa6="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='21',ledger_id='21',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa6=mysqli_query($conn,$icaa6);
		
		$icaa="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='1',ledger_id='1',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa=mysqli_query($conn,$icaa);
		
		$icaa7="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='27',ledger_id='27',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa7=mysqli_query($conn,$icaa7);
		
		$icaa9="insert into account_cash_bank set amount='".$edi1['gst_amt']."',date='".$_POST['pdate']."',ledger_group_id='61',ledger_id='91',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa9=mysqli_query($conn,$icaa9);
		
		$icaa12="insert into account_cash_bank set amount='".$_POST['NetAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
		
		$icaa12="insert into account_cash_bank set amount='".$_POST['PendingAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Purchase',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
		
			$icaa12="insert into account_cash_bank set amount='".$_POST['PaidAmount']."',date='".$_POST['pdate']."',ledger_group_id='40',ledger_id='40',payment_mode='".$_POST['paymentoption']."',type='Credit',Narration='Account Payable',table_id='$Ed',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
        $Eicaa22=mysqli_query($conn,$icaa12);
	
	
}   
 if(($_POST['paymentoption']!='Cash') && ($_POST['paymentoption']!='Bank') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['pdate']."',LedgerGroup='".$_POST['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['PaidAmount']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase',BankId='".$_POST['BankId']."',LedgerId='".$_POST['SLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

     $Epw="select * from s_purchase_details_temp where inv_no='".$_POST['inv_no']."'";
     $Tip=mysqli_query($conn,$Epw);
     while($edi=mysqli_fetch_array($Tip))
        {
	      $Rcm="insert into s_purchase_details set inv_no='$Ed',supplier_name='".$edi['supplier_name']."',spare_brand='".$edi['spare_brand']."',spare_name='".$edi['spare_name']."',spare_part_no='".$edi['spare_part_no']."',unit='".$edi['unit']."',mrp='".$edi['mrp']."',discount_per='".$edi['discount']."',discount_amt='".$edi['discount_amt']."',purchase_rate='".$edi['purchase_rate']."',qty='".$edi['qty']."',total='".$edi['total']."',sgst='".$edi['sgst']."',cgst='".$edi['cgst']."',igst='".$edi['igst']."',gst_amt='".$edi['gst_amt']."',total_amount='".$edi['net_amount']."',TotalGstPer='".$edi['TotalGstPer']."',status='Active',pdate='".$_POST['pdate']."',purchase_details='Open',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $Edm=mysqli_query($conn,$Rcm);

//Stock Update Start----
		 $echeck1="select * from item_stock where ItemId='".$edi['spare_name']."' and FranchiseeId='".$var['branch_id']."' and Uom='".$edi['unit']."'"; 
         $echk1=mysqli_query($conn,$echeck1);
         $ecount1=mysqli_fetch_array($echk1); 
		 $nr=mysqli_num_rows($echk1);	
		 if($nr>'0')
		   {
			   $echecks="Update item_stock set StockQuantity=StockQuantity+'".$edi['qty']."' where ItemId='".$edi['spare_name']."' and FranchiseeId='".$var['branch_id']."' and Uom='".$edi['unit']."'"; 
			   $echks=mysqli_query($conn,$echecks);
		   }
		   if($nr=='0')
		   {
			    $stock="insert into item_stock set FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',ItemId='".$edi['spare_name']."',StockQuantity='".$edi['qty']."',Uom='".$edi['unit']."'";
			    $stocks=mysqli_query($conn,$stock); 
		   }
		   $tia=$tia+$edi['net_amount'];
		}
//Stock Update End----

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
      $pi1="insert into sup_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$Fpm2['supplier_name']."',invoice_amt='$tia',invoice = '".strtoupper($_POST['inv_no'])."',paid_amt='0',p_date='".strtoupper($Fpm2['pdate'])."',balance_amt='$ttlos',total_outstanding='$ttlos',franchisee_id='".$_SESSION['BranchId']."',vendor_id='".$_SESSION['VendorId']."'";  
      $Epi1=mysqli_query($conn,$pi1);
//Outstanding End---->


     $stand1="select * from sup_outstanding where cust_name='".$Fpm2['supplier_name']."' order by id desc"; 
     $spt1=mysqli_query($conn,$stand1);
     $rep1=mysqli_fetch_array($spt1);

     $purchase="update m_supplier set  opening_balance='".$rep1['total_outstanding']."' where sid='".$rep1['cust_name']."'";  
     $pur=mysqli_query($conn,$purchase);

    // $purchase="update s_purchase set  total='$tia' where inv_no='".$_POST['inv_no']."'";  
     // $pur=mysqli_query($purchase);


    $pm3="delete from s_purchase_details_temp where inv_no='".$_POST['inv_no']."'";
    $Epm3=mysqli_query($conn,$pm3);
    header("location:s_purchase_view.php");
    }
}
?>