<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$rvm="select * from s_purchase_details where id='".$_POST['id']."'";
$Edc=mysqli_query($conn,$rvm);
$Wsc=mysqli_fetch_array($Edc);

//-->start insert purchase return
$Rep="insert into s_purchase_return set inv_no='".$_POST['inv_no']."',rdate='".$_POST['rdate']."',FrachiseeId='".$_POST['FranchiseeId']."',supplier_name='".$_POST['supplier_name']."',sbrand='".$_POST['sbrand']."',sname='".$_POST['sparename']."',spart_no='".$_POST['spart_no']."',prate='".['purchase_rate']."',return_qty='".$_POST['qty']."',total_qty='".$Wsc['qty']."',description='".$_POST['description']."'";
$Wsp=mysqli_query($conn,$Rep);
//-->end insert purchase return



//-->update the Purchase Details qty and amount
$Ewp="update s_purchase_details set qty=qty-'".$_POST['qty']."',total=total-'".$_POST['total']."',sgst=sgst-'".$_POST['sgst']."',cgst=cgst-'".$_POST['cgst']."',igst=igst-'".$_POST['igst']."',gst_amt=gst_amt-'".$_POST['gst_amt']."',total_amount=total_amount-'".$_POST['net_amt']."' where id='".$_POST['id']."'";
$Wep=mysqli_query($conn,$Ewp);
//-->end the update Purchase Details qty and amount








//-->stock Update start
  $Tpo="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty']."' where FranchiseeId='".$_POST['FranchiseeId']."' and ItemId='".$_POST['sparename']."' and Uom='".$_POST['unit']."'";
$Qwp=mysqli_query($conn,$Tpo); 
//-->stock Update end


$wse="select * from s_purchase where inv_no='".$_POST['inv_no']."'";
$edcx=mysqli_query($conn,$wse);
$edxs=mysqli_fetch_array($edcx);

$Epw="select * from s_purchase_details where inv_no='".$edxs['id']."'";
$Tip=mysqli_query($conn,$Epw);
while($edi=mysqli_fetch_array($Tip))
{
	
	$tia=$tia+$edi['total_amount'];
}

$ipsw="update s_purchase set GstAmount=GstAmount-'".$Wsc['gst_amt']."',TotalPurchaseAmount=TotalPurchaseAmount-'".$Wsc['total_amount']."',PaidAmount=PaidAmount-'".$_POST['net_amt']."' where inv_no='".$_POST['inv_no']."'"; 
$Ewar=mysqli_query($conn,$ipsw); 


//-->Cash Account Updation for purchase Return
$rvm2="select * from s_purchase where inv_no='".$_POST['inv_no']."'";
$Edc2=mysqli_query($conn,$rvm2);
$Wsc2=mysqli_fetch_array($Edc2);
 if($Wsc2['paymentoption']=='Cash' )
	   {		  
$cash_acc="insert into account_cash set TransactionDate='".$_POST['rdate']."',LedgerGroup='23',TransactionType='Credit',Amount='".$_POST['net_amt']."',ReferenceNo='".$_POST['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase Return',LedgerId='".$_POST['SLI']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
	   }
//-->End Cash Account Updation for purchase Return
//-->Bank Account Updation for purchase Return
$demaa="select * from a_bank_acc where Id='".$Wsc2['AccountNo']."'";
$rmpaa=mysqli_query($conn,$demaa);
$rcmaa=mysqli_fetch_array($rmpaa);
 if(($Wsc2['paymentoption']!='Cash') && ($Wsc2['paymentoption']!='Credit') )
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['rdate']."',LedgerGroup='23',TransactionType='Credit',Amount='".$_POST['net_amt']."',ReferenceNo='".$Wsc2['inv_no']."',TransactionFrom='s_purchase',Remarks='Purchase Return',BankId='".$rcmaa['Id']."',LedgerId='".$_POST['SLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }
//-->End Bank Account Updation for purchase Return
$wss="select * from s_purchase where inv_no='".$_POST['inv_no']."'";
$edcs=mysqli_query($conn,$wss);
$edxsq=mysqli_fetch_array($edcs);

$stand="select * from sup_outstanding where invoice='".$edxsq['inv_no']."' and cust_name='".$edxsq['supplier_name']."'";
$spt=mysqli_query($conn,$stand);
$rep=mysqli_fetch_array($spt);

$stand1="select * from sup_outstanding where cust_name='".$edxsq['supplier_name']."' order by id desc";
$spt1=mysqli_query($conn,$stand1);
$rep1=mysqli_fetch_array($spt1);

$totaloutstanding=$rep1['total_outstanding'];
$invoice_pervious=$edxs['total'];
$invoice_after=$edxsq['total'];

$outstandbefor=$rep1['total_outstanding']-$edxs['total'];
$outstandafter=$outstandbefor+$invoice_after;

$balance_amt_befor=$rep1['balance_amt']-$edxs['total'];
$balance_amt_after=$balance_amt_befor+$invoice_after;

$out="insert into sup_outstanding set cust_name='".$edxsq['supplier_name']."',invoice='".$edxsq['inv_no']."',p_date='".$_POST['rdate']."',invoice_amt='$invoice_after',total_outstanding='$outstandafter',balance_amt='$balance_amt_after'"; 
$outp=mysqli_query($conn,$out);


header("location:s_purchase_view.php?inv_no=$inv_no");
?>