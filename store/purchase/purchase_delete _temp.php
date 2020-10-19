<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$inv_no=$_REQUEST['inv_no'];
 $ct="delete from s_purchase_details_temp WHERE id='$id'"; 
$Ect=mysql_query($conn,$ct);
$ct1="delete from s_purchase_details_temp WHERE inv_no='$$inv_no'"; 
$Ect1=mysql_query($conn,$ct1);
$inv_no=$_REQUEST['inv_no'];

header("Location: s_purchase.php?inv_no=$inv_no");
?>