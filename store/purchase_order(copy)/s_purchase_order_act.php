<?php
include("../../includes.php");

$FrachiseeId=$_POST['FranchiseeId'];


  $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


if($_POST['sparename']!="")
{
 $pm="insert into s_purchase_order_temp set FrachiseeId='".$_SESSION['FranchiseeId']."',inv_no='".strtoupper($_POST['inv_no'])."',pdate='".$_POST['pdate']."',supplier_name='".$_POST['supplier_name']."',outstand='".$_POST['out']."',gstin='".$_POST['gstin']."'";  
$Epm=mysqli_query($conn,$pm);

$Rpm="insert into s_purchase_order_details_temp set inv_no='".strtoupper($_POST['inv_no'])."',supplier_name='".$_POST['supplier_name']."',spare_brand='".$_POST['sbrand']."',spare_name='".$_POST['sparename']."',spare_part_no='".$_POST['spart_no']."',unit='".$_POST['unit']."',mrp='".$_POST['prate']."',discount='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',purchase_rate='".$_POST['purchase_rate']."',qty='".$_POST['qty']."',total='".$_POST['total']."',gst='".$_POST['gst']."',gst_amt='".$_POST['gst_amt']."',net_amount='".$_POST['net_amt']."'";
$Erp=mysqli_query($conn,$Rpm);
$inv_no=$_POST['inv_no'];
header("location:s_purchase_order.php?inv_no=$inv_no");
}
else
{
	$pm1="select * from s_purchase_order_temp where inv_no='".$_POST['inv_no']."'";
	$Epm1=mysqli_query($conn,$pm1);
    $Fpm1=mysqli_fetch_array($Epm1);

		$pm2="insert into s_purchase_order set inv_no='".$_POST['inv_no']."',pdate='".$Fpm1['pdate']."',supplier_name='".$Fpm1['supplier_name']."',outstand='".$Fpm1['outstand']."',status='Active',purchase_details='Open',description='".$_POST['description']."',gstin='".$_POST['gstin']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
		$Epm2=mysqli_query($conn,$pm2);
		$Ed=mysqli_insert_id($conn);

$Epw="select * from s_purchase_order_details_temp where inv_no='".$_POST['inv_no']."'";
$Tip=mysqli_query($conn,$Epw);
while($edi=mysqli_fetch_array($Tip))
{
	$Rcm="insert into s_purchase_order_details set inv_no='$Ed',supplier_name='".$edi['supplier_name']."',spare_brand='".$edi['spare_brand']."',spare_name='".$edi['spare_name']."',spare_part_no='".$edi['spare_part_no']."',unit='".$edi['unit']."',mrp='".$edi['mrp']."',discount_per='".$edi['discount']."',discount_amt='".$edi['discount_amt']."',purchase_rate='".$edi['purchase_rate']."',qty='".$edi['qty']."',total='".$edi['total']."',gst='".$edi['gst']."',gst_amt='".$edi['gst_amt']."',total_amount='".$edi['net_amount']."',status='Active'";
	$Edm=mysqli_query($conn,$Rcm);

}
$pm6="delete from s_purchase_order_temp where inv_no='".$_POST['inv_no']."'";
$Epm6=mysqli_query($conn,$pm6);

$pm3="delete from s_purchase_order_details_temp where inv_no='".$_POST['inv_no']."'";
$Epm3=mysqli_query($conn,$pm3);

header("location:s_purchase_order_view.php");


}
?>