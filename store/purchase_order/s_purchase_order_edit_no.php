<?php
include("../../includes.php");
include("../../redirect.php");

$inv_no=$_REQUEST['inv_no'];

 $pm1="select * from s_purchase_order where inv_no='$inv_no'"; 
$Epm1=mysqli_query($conn,$pm1);
$Fpm1=mysqli_fetch_array($Epm1);

		$pm2="insert into s_purchase_order_temp set inv_no='".$Fpm1['inv_no']."',pdate='".$Fpm1['pdate']."',supplier_name='".$Fpm1['supplier_name']."',outstand='".$Fpm1['outstand']."',FrachiseeId='".$Fpm1['FranchiseeId']."'";
		$Epm2=mysqli_query($conn,$pm2); 

  $Epw="select * from s_purchase_order_details where inv_no='".$Fpm1['id']."'"; 
$Tip=mysqli_query($conn,$Epw);
while($edi=mysqli_fetch_array($Tip))
{
	 $Rcm="insert into s_purchase_order_details_temp set inv_no='".$Fpm1['inv_no']."',supplier_name='".$edi['supplier_name']."',spare_brand='".$edi['spare_brand']."',spare_name='".$edi['spare_name']."',spare_part_no='".$edi['spare_part_no']."',unit='".$edi['unit']."',mrp='".$edi['mrp']."',discount='".$edi['discount_per']."',discount_amt='".$edi['discount_amt']."',purchase_rate='".$edi['purchase_rate']."',qty='".$edi['qty']."',total='".$edi['total']."',gst='".$edi['gst']."',gst_amt='".$edi['gst_amt']."',net_amount='".$edi['total_amount']."'";
	$Edm=mysqli_query($conn,$Rcm); 
}
header("Location: s_purchase_order_edit.php?inv_no=$inv_no");
?>