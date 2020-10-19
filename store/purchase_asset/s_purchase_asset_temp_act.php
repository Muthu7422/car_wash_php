<?php
include("../../includes.php");

 $FrachiseeId=$_POST['FrachiseeId']; 

if($_POST['ProductName']!="")
{
$tot=$_POST['PurchaseRate']*$_POST['Quantity'];
  $pm="insert into s_purchase_asset_temp set InvoiceNo='".$_POST['InvoiceNo']."',PaDate='".strtoupper($_POST['PaDate'])."',FranchiseeId='".$FrachiseeId."',SupplierName='".$_POST['SupplierName']."',ProductName='".strtoupper($_POST['ProductName'])."',ProductBrand='".$_POST['ProductBrand']."',ProductModel='".$_POST['ProductModel']."',OtherSpecificaton='".$_POST['OtherSpecificaton']."',PurchaseRate='".$_POST['PurchaseRate']."',Quantity='".$_POST['Quantity']."',ExpiryDate='".$_POST['ExpiryDate']."',ServicePerson='".$_POST['ServicePerson']."',Remarks='".$_POST['Remarks']."',total='".$tot."',status='Active'";  
$Epm=mysqli_query($conn,$pm); 
$InvoiceNo=$_POST['InvoiceNo'];
header("location:s_purchase_asset.php?InvoiceNo=$InvoiceNo");
}
else
{
$tia=0;
$pm1="select * from s_purchase_asset_temp where InvoiceNo='".$_POST['InvoiceNo']."'";
$Epm1=mysqli_query($conn,$pm1);
while($Fpm1=mysqli_fetch_array($Epm1))
{

 $pm2="insert into s_purchase_asset set InvoiceNo='".strtoupper($_POST['InvoiceNo'])."',PaDate='".strtoupper($Fpm1['PaDate'])."',FranchiseeId='".$Fpm1['FranchiseeId']."',SupplierName='".strtoupper($Fpm1['SupplierName'])."',ProductName='".strtoupper($Fpm1['ProductName'])."',ProductBrand='".$Fpm1['ProductBrand']."',ProductModel='".$Fpm1['ProductModel']."',OtherSpecificaton='".strtoupper($Fpm1['OtherSpecificaton'])."',PurchaseRate='".strtoupper($Fpm1['PurchaseRate'])."',Quantity='".strtoupper($Fpm1['Quantity'])."',ExpiryDate='".strtoupper($Fpm1['ExpiryDate'])."',ServicePerson='".strtoupper($Fpm1['ServicePerson'])."',Remarks='".strtoupper($Fpm1['Remarks'])."',total='".$Fpm1['total']."',status='Active',purchase_details='Open'";
$Epm2=mysqli_query($conn,$pm2);
}


$pm3="delete from s_purchase_asset_temp where InvoiceNo='".$_POST['InvoiceNo']."'";
$Epm3=mysqli_query($conn,$pm3);

header("location:s_purchase_asset_view.php");
}


?>