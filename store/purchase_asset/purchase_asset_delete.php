<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
echo $ct="delete from s_purchase_asset_temp WHERE id='$id'"; 
$Ect=mysqli_query($conn,$ct);
$InvoiceNo=$_REQUEST['InvoiceNo'];

header("Location:s_purchase_asset.php?InvoiceNo=$InvoiceNo");
?>