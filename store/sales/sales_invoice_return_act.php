<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$rvm="select * from sales_invoice where inv_no='".$_POST['inv_no']."'";
$Edc=mysqli_query($conn,$rvm);
$edxs=mysqli_fetch_array($Edc);

//-->start insert sales return
$Rep="insert into sales_invoice_return set inv_no='".$_POST['inv_no']."',rdate='".$_POST['rdate']."',branch_name='".$_POST['FranchiseeId']."',cust_name='".$_POST['cust_name']."',spare_brand='".$_POST['sbrand']."',spare_name='".$_POST['sparename']."',mrp='".$_POST['mrp']."',qty='".['qty']."',total_amt='".$_POST['total_amount']."',discount_per='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',total='".$_POST['total']."',sgst='".$_POST['sgst']."',cgst='".$_POST['cgst']."',igst='".$_POST['igst']."',gst_amt='".$_POST['gst_amt']."',net_amt='".$_POST['net_amt']."',description='".$_POST['description']."'";
$Wsp=mysqli_query($conn,$Rep);
//-->end insert sales return

//-->update the sales
$Ewp="update sales_invoice_details set qty=qty-'".$_POST['qty']."',total=total-'".$_POST['total_amount']."' where id='".$_POST['id']."'";
$Wep=mysqli_query($conn,$Ewp);
//-->end the update sales

//-->update the sales Details qty and amount
$Ewp1="update sales_invoice set total_amt=total_amt-'".$_POST['total_amount']."',dicount_amt=dicount_amt-'".$_POST['discount_amt']."',total=total-'".$_POST['total']."',gst_amt=gst_amt-'".$_POST['gst_amt']."',bill_amt=bill_amt-'".$_POST['net_amt']."',bal_amt=bal_amt-'".$_POST['bal_amt']."',rec_amt=rec_amt-'".$_POST['total_amount']."' where inv_no='".$_POST['inv_no']."'";
$Wep1=mysqli_query($conn,$Ewp1);
//-->end the update sales Details qty and amount

				  $sql="select * from m_spare where sid='".$_POST['sparename']."'";
				  $result=mysqli_query($conn,$sql);
				  $row = mysqli_fetch_array($result);

//-->stock Update start
 $Tpo="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty']."' where FranchiseeId='".$_POST['FranchiseeId']."' and ItemId='".$_POST['sparename']."' and Uom='".$row['units']."'";
$Qwp=mysqli_query($conn,$Tpo);
//-->stock Update end


//Customer Outstanding Start

 $wss="select * from sales_invoice where inv_no='".$_POST['inv_no']."'"; 
$edcs=mysqli_query($conn,$wss);
$edxsq=mysqli_fetch_array($edcs);

 if($edxsq['payment_mode']=='Cash' )
	   {		
$cash_acc="insert into account_cash set TransactionDate='".$_POST['rdate']."',LedgerGroup='".$edxsq['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['total_amount']."',ReferenceNo='".$edxsq['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales Return',LedgerId='".$_POST['CLI']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
	   }

$demaa="select * from a_bank_acc where Id='".$edxsq['AccountNo']."'";
$rmpaa=mysqli_query($conn,$demaa);
$rcmaa=mysqli_fetch_array($rmpaa);

if(($edxsq['payment_mode']!='Cash') && ($edxsq['payment_mode']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['rdate']."',LedgerGroup='".$edxsq['LedgerGroup']."',TransactionType='Debit',Amount='".$_POST['total_amount']."',ReferenceNo='".$edxsq['inv_no']."',TransactionFrom='sales_invoice',Remarks='Sales Return',BankId='".$rcmaa['Id']."',LedgerId='".$_POST['LedgerId']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

 $stand="select * from cust_outstanding where invoice='".$edxsq['inv_no']."' and cust_name='".$edxsq['cname']."'"; 
$spt=mysqli_query($conn,$stand);
$rep=mysqli_fetch_array($spt);

 $stand1="select * from cust_outstanding where cust_name='".$edxsq['cname']."' order by id desc"; 
$spt1=mysqli_query($conn,$stand1);
$rep1=mysqli_fetch_array($spt1);

$totaloutstanding=$rep1['total_outstanding'];
$invoice_pervious=$edxs['bal_amt'];
$invoice_after=$edxsq['bal_amt'];

$invoice_amount=$edxsq['bill_amt'];

$outstandbefor=$rep1['total_outstanding']-$invoice_pervious;
$outstandafter=$outstandbefor+$invoice_after;

$balance_amt_befor=$rep1['balance_amt']-$invoice_pervious;
$balance_amt_after=$balance_amt_befor+$invoice_after;

 $out="insert into cust_outstanding set cust_name='".$edxsq['cname']."',invoice='".$edxsq['inv_no']."',p_date='".$_POST['rdate']."',invoice_amt='$invoice_amount',total_outstanding='$outstandafter',balance_amt='$balance_amt_after'"; 
$outp=mysqli_query($conn,$out); 

//end customer Outstanding

$inv_no=$_POST['inv_no'];
header("location:sales_retrun_view.php?inv_no=$inv_no");
?>