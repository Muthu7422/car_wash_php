<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
 $ct1="delete from s_purchase_order_details_temp WHERE id='$id'"; 
$Ect1=mysqli_query($conn,$ct1);
$inv_no=$_REQUEST['inv_no'];

header("Location: s_purchase_order.php?inv_no=$inv_no");
?>