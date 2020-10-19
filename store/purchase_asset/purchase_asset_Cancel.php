<?php
include("../../includes.php");
include("../../redirect.php");

$InvoiceNo=$_REQUEST['InvoiceNo'];

 $purchase="update s_purchase_asset set  purchase_details='Close' where InvoiceNo='$InvoiceNo' and 	FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$pur=mysql_query($conn,$purchase);

header("Location:s_purchase_asset_view.php");
?>