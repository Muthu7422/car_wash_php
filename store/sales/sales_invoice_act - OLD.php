<?php
include("../../includes.php");
include("../../redirect.php");


//if(!isset($_POST['submit']))
if($_POST['quantity']>'0')
{
$_SESSION['customer_name']=$_POST['customer_name'];
$_SESSION['date']=$_POST['date'];
$_SESSION['description']=$_POST['description'];
$_SESSION['out']=$_POST['out'];
$_SESSION['gstin']=$_POST['gstin'];
$_SESSION['total']=$_POST['total'];
$_SESSION['TotalTaxAmount']=$_POST['TotalTaxAmount'];
$_SESSION['bill_amt']=$_POST['bill_amt'];
$_SESSION['CLI']=$_POST['CLI'];

 $sei="select item_id from sales_invoice_details_temp where item_id='".$_POST['sid']."' AND session_id='".session_id()."'";
$Esei=mysqli_query($conn,$sei);
$enr=mysqli_num_rows($Esei);
if($enr<'1')
{
 $stm="select StockQuantity from item_stock where ItemId='".$_POST['sid']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
$sitm=mysqli_query($conn,$stm);
$Ditm=mysqli_fetch_array($sitm);

//if($Ditm['StockQuantity']>=$_POST['quantity'])	
if(1==1)
{
$taxamount=number_format($_POST['mrp']-((100/(100+$_POST['TaxRate']))*$_POST['mrp']),2);
	$itemrate=number_format(((100/(100+$_POST['TaxRate']))*$_POST['mrp']),2);
	
	$it="insert into  sales_invoice_details_temp set session_id='".session_id()."',item_id='".$_POST['sid']."',qty='".$_POST['quantity']."',tax_amount='$taxamount',item_rate='$itemrate',item_tax='".$_POST['TaxRate']."',mrp='".$_POST['mrp']."'";
	$Esr=mysqli_query($conn,$it);
    header("location:sales_invoice.php?m=5"); 	
}
else
{
header("location:sales_invoice.php?msg=Stock not Available!"); 	
}	
}
else
{
header("location:sales_invoice.php?msg=Stock Already Exist!"); 	
}	 	
}





?>