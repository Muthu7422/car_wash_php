<?php
include("../../includes.php");
include("../../redirect.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $dd="delete * from sales_invoice_details where inv_id='".$_POST['SalesId']."'";
$Edd=mysqli_query($conn,$dd);

$rpe="select * from sales_invoice_details where inv_no='$inv_no'"; 
$rpm=mysqli_query($conn,$rpe);
while($spm=mysqli_fetch_array($rpm))
{
//$pos="select * from m_spare where sname='".$spm['sname']."'";
//$rmp=mysqli_query($pos);
//$scm=mysqli_fetch_array($rmp);
$stock="update item_stock set StockQuantity=StockQuantity + '".$spm['qty']."' where ItemId='".$spm['spare_name']."' and FranchiseeId='".$var['branch_id']."' and vendor_id='".$var1['vendor_id']."'"; 
$stk=mysqli_query($stock);


}

//$tout=$FEsbo1['total_outstanding']+$_POST['balance_amount'];
//Out Standing Start
$pia="select * from cust_outstanding where invoice='".$_POST['inv_no']."' order by id desc";
$Epia=mysqli_query($conn,$pia);
$FEpia=mysqli_fetch_array($Epia);
$PBal=$FEpia['balance_amt'];

$tia=$_POST['balance_amount'];
$sbo="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc";
$Esbo=mysqli_query($conn,$sbo);
$FEsbo=mysqli_fetch_array($Esbo);
$POa=$FEsbo['total_outstanding'];
$COa=$POa-$PBal;

//$ttlos=$FEsbo['total_outstanding']+$tia;
//$pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$_POST['customer_name']."',invoice_amt='$tia',invoice = '".$_POST['inv_no']."',paid_amt='0',p_date='".$_POST['date']."',balance_amt='$tia',total_outstanding='$ttlos'";  
//$Epi1=mysqli_query($pi1);
//Outstandung End




$som="update sales_invoice set inv_no='".$_POST['inv_no']."',sdate='".$_POST['date']."',branch_name='".$_POST['branch_name']."',cname='".$_POST['customer_name']."',cust_out_stand='".$_POST['out']."',total_amt='".$_POST['total']."',discount_per='".$_POST['discount_per']."',total='".$_POST['total_amt']."',dicount_amt='".$_POST['dicount_amt']."',sgst='".$_POST['sgst']."',cgst='".$_POST['cgst']."',igst='".$_POST['igst']."',gst_amt='".$_POST['gst_amt']."',bill_amt='".$_POST['bill_amt']."',rec_amt='".$_POST['recable_amount']."',bal_amt='".$_POST['balance_amount']."',payment_mode='".$_POST['payment_mode']."',description='".$_POST['description']."',bill_status='Open',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_POST['SalesId']."'"; 
$soms=mysqli_query($conn,$som); 
$pcm=$_POST['SalesId'];
for($i=1;$i<11;$i++)
{
	if($_POST['amount'.$i]!="")
	{
	$pms="update sales_invoice_details set spard_brand='".$_POST['spare_brand'.$i]."',spare_name='".$_POST['spare_name'.$i]."',mrp='".$_POST['mrp'.$i]."',qty='".$_POST['qty'.$i]."',total='".$_POST['amount'.$i]."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_POST['id'.$i]."'"; 
	$Epms=mysqli_query($conn,$pms); 
	
	if($_POST['id'.$i]=='')
	{
	$pms="insert into sales_invoice_details set inv_id='$pcm',inv_no='".$_POST['inv_no']."',spard_brand='".$_POST['spare_brand'.$i]."',spare_name='".$_POST['spare_name'.$i]."',mrp='".$_POST['mrp'.$i]."',qty='".$_POST['qty'.$i]."',total='".$_POST['amount'.$i]."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'"; 
	$Epms=mysqli_query($conn,$pms); 
	}
	$stm="select * from item_stock where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
	$sitm=mysqli_query($conn,$stm);
	$nr=mysqli_num_rows($sitm);
	$Ditm=mysqli_fetch_array($nr);

	$sss="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty'.$i]."' where ItemId='".$_POST['spare_name'.$i]."' and FranchiseeId='".$var['branch_id']."' and vendor_id='".$var1['vendor_id']."'"; 
	$Esss=mysqli_query($conn,$sss);
	
	 $dd="delete from sales_invoice_details where qty='0.00'";
	$Edd=mysqli_query($conn,$dd);
	
	}
}
if($_POST['payment_mode']=="Credit")
{
$sbo1="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc"; 
$Esbo1=mysqli_query($conn,$sbo1);
$FEsbo1=mysqli_fetch_array($Esbo1);
if($FEsbo1['ad_amount']=='')
{
	$eaa=0;
}
else
{
	$eaa=$FEsbo1['ad_amount'];
}
$tout=$FEsbo1['total_outstanding']+$_POST['balance_amount'];
//Out Standing Start
$tia=$_POST['balance_amount'];
$sbo="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc";
$Esbo=mysqli_query($conn,$sbo);
$FEsbo=mysqli_fetch_array($Esbo);
$ttlos=$FEsbo['total_outstanding']+$tia;



$InvoiceAmount=$_POST['bill_amt'];
$PaidAmount=$_POST['recable_amount'];
$BalanceAmount=$_POST['balance_amount'];
$TotalOA=$COa+$BalanceAmount;
$pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$_POST['customer_name']."',invoice_amt='InvoiceAmount',invoice = '".$_POST['inv_no']."',paid_amt='$PaidAmount',p_date='".$_POST['date']."',balance_amt='$BalanceAmount',total_outstanding='$TotalOA'";  
$Epi1=mysqli_query($conn,$pi1);
//Outstandung End

$cust="update a_customer set cus_out_amt='$TotalOA' where id='".$_POST['customer_name']."' and  FrachiseeId='".$var['branch_id']."' and vendor_id='".$var1['vendor_id']."'";
$custo=mysqli_query($conn,$cust);
}
$inv_no=$_POST['inv_no'];
header("location:sales_invoice_receipt.php?inv_no=$inv_no");
?>