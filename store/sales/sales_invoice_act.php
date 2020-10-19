<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

	$mob="select * from a_customer where cust_name='".$_POST['customer']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);

 $som="insert into sales_invoice set inv_no='".$_POST['inv_no']."',sdate='".$_POST['date']."',branch_name='".$_POST['branch_name']."',cname='".$_POST['customer_name']."',cust_out_stand='".$_POST['out']."',gstin='".$_POST['gstin']."',total_amt='".$_POST['total']."',TotalTaxAmount='".$_POST['TotalTaxAmount']."',ActualSellingPrice='".$_POST['bill_amt']."',description='".$_POST['description']."',bill_status='Open',LedgerId='".$_POST['CLI']."',AMCUsed='".$_POST['u_am_point']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'"; 
$soms=mysqli_query($conn,$som); 
$pcm=mysqli_insert_id($conn);


/**Calculate AMC Statrt*/
$samc="select AMC from a_customer where id='".$_POST['customer_name']."'";
$Esamc=mysqli_query($conn,$samc);
$Fsamc=mysqli_fetch_array($Esamc);
//DiscountedAmount
$amcpoint=(($_POST['bill_amt'])/10);
if($Fsamc['AMC']=="Yes")
{
	if($_POST['PaymentMode']=='No')
	{
	$uamc="update a_customer set AMCEarned=AMCEarned+$amcpoint where id='".$_POST['customer_name']."'";
	$Euamc=mysqli_query($conn,$uamc); 
}
}

	 if($_POST['PaymentMode']=='Yes')
	 {
 $uamc1="update a_customer set AMCEarned='".$_POST['b_am_point']."' where id='".$_POST['customer_name']."'";
	$Euamc1=mysqli_query($conn,$uamc1);
	 }	
	 
	 
/**Calculate AMC End*/


if($_POST['ttype']=="Cash")
{
$cash_acc="insert into account_cash set TransactionDate='".$_POST['date']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['bill_amt']."',ReferenceNo='".$jcno."',TransactionFrom='sales_order',Remarks='Sales',LedgerId='".$_POST['CLI']."',franchisee_id='".$var1['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if($_POST['ttype']!='Cash')
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['date']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['bill_amt']."',ReferenceNo='".$jcno."',TransactionFrom='sales_order',Remarks='Sales',BankId='".$_POST['BankId']."',LedgerId='".$_POST['CLI']."',franchisee_id='".$var1['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }



for($i=1;$i<11;$i++)
{
	if($_POST['amount'.$i]!="")
{
		$cgst=$_POST['gst'.$i]/2;
		$sgst=$_POST['gst'.$i]/2;
        $igst='0';
  $pms="insert into sales_invoice_details set sdate='".$_POST['date']."',inv_id='$pcm',inv_no='".$_POST['inv_no']."',spard_brand='".$_POST['spare_brand'.$i]."',spare_name='".$_POST['spare_name'.$i]."',hsn_code='".$_POST['hsn'.$i]."',mrp='".$_POST['mrp'.$i]."',TaxOfMrp='".$_POST['TaxOfMrp'.$i]."',BeforeTaxOfMrp='".$_POST['BeforeTaxOfMrp'.$i]."',qty='".$_POST['qty'.$i]."',total='".$_POST['amount'.$i]."',cgst='".$cgst."',sgst='".$sgst."',igst='".$igst."',tax_amt='".$_POST['tax_amt'.$i]."',total_amount='".$_POST['total_amount'.$i]."',bill_status='Open',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'"; 
$Epms=mysqli_query($conn,$pms); 


$stm="select * from item_stock where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$var['branch_id']."'";
$sitm=mysqli_query($conn,$stm);
$nr=mysqli_num_rows($sitm);
$Ditm=mysqli_fetch_array($nr);

 $sss="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty'.$i]."' where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$var['branch_id']."'"; 
$Esss=mysqli_query($conn,$sss);
}	
}
$inv_no=$_POST['inv_no'];
header("location:sales_invoice_receipt.php?inv_no=$inv_no");
?>