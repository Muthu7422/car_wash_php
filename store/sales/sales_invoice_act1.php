<?php
include("../../includes.php");
include("../../redirect.php");

$ssi="select salesin from job_card_no where id='1'";	
$Essi=mysqli_query($conn,$ssi);
$FEssi=mysqli_fetch_array($Essi);
$sin="SA".$FEssi['salesin'];

$ussi="update job_card_no set salesin=salesin+1 where id='1'";
$Eussi=mysqli_query($conn,$ussi);
	
	
$smrp="select sum(mrp) as mrp from sales_invoice_details_temp where session_id='".session_id()."'";	
$Esmrp=mysqli_query($conn,$smrp);
$FEsmrp=mysqli_fetch_array($Esmrp);

$stta="SELECT sum(qty*tax_amount) as tta FROM sales_invoice_details_temp where session_id='".session_id()."'";	
$Estta=mysqli_query($conn,$stta);
$FEstta=mysqli_fetch_array($Estta);


$stssa="SELECT sum(qty*mrp) as stssa FROM sales_invoice_details_temp where session_id='".session_id()."'";	
$Estssa=mysqli_query($conn,$stssa);
$FEstssa=mysqli_fetch_array($Estssa);

 $som="insert into sales_invoice set inv_no='$sin',sdate='".$_SESSION['date']."',branch_name='".$_SESSION['branch_name']."',cname='".$_SESSION['customer_name']."',cust_out_stand='".$_SESSION['out']."',gstin='".$_SESSION['gstin']."',total_amt='".$FEstssa['stssa']."',TotalTaxAmount='".$FEstta['tta']."',ActualSellingPrice='".$FEstssa['stssa']."',FranchiseeId='".$_SESSION['FranchiseeId']."',description='".$_SESSION['description']."',bill_status='Open',LedgerId='".$_SESSION['CLI']."'"; 
$soms=mysql_query($som); 
$pcm=mysql_insert_id();

$s="select * from sales_invoice_details_temp where session_id='".session_id()."'";
$Es=mysqli_query($conn,$s);
while($FEs=mysqli_fetch_array($Es))
{
$cgst=$FEs['item_tax']/2;
$sgst=$FEs['item_tax']/2;
$igst='0';
		
$ttl=number_format(($FEs['mrp']*$FEs['qty']),2);
$pms="insert into sales_invoice_details set sdate='".$_SESSION['date']."',inv_id='$pcm',inv_no='$sin',spard_brand='',spare_name='".$FEs['item_id']."',mrp='".$FEs['mrp']."',TaxOfMrp='".$FEs['tax_amount']."',BeforeTaxOfMrp='".$FEs['item_rate']."',qty='".$FEs['qty']."',total='$ttl',cgst='".$cgst."',sgst='".$sgst."',igst='".$igst."',tax_amt='',total_amount='$ttl',bill_status='Open'"; 
$Epms=mysql_query($pms); 

 $stm="select * from item_stock where ItemId='".$FEs['item_id']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
$sitm=mysql_query($stm);
$nr=mysql_num_rows($sitm);
$Ditm=mysql_fetch_array($sitm);

 $sss="update item_stock set StockQuantity= StockQuantity - '".$FEs['qty']."' where ItemId='".$FEs['item_id']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$Esss=mysql_query($sss);



}

$dtemp="delete from sales_invoice_details_temp where session_id='".session_id()."'";
$Edtemp=mysql_query($dtemp);
unset($_SESSION['customer_name']);
unset($_SESSION['date']);
unset($_SESSION['description']);
unset($_SESSION['out']);
unset($_SESSION['gstin']);
unset($_SESSION['total']);
unset($_SESSION['TotalTaxAmount']);
unset($_SESSION['bill_amt']);
unset($_SESSION['CLI']);

//unset($_SESSION['customer_name']);
//unset($_SESSION['date']);
//unset($_SESSION['description']);
//salesbill_payment_mode.php?inv_no=SA12&&id=17
$inv_no=$sin;
header("location:salesbill_payment_mode.php?inv_no=$inv_no&id=$pcm");




?>