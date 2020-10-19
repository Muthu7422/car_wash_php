<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$q_no=$_REQUEST['q_no'];
 $ct="delete from s_quotation_details_temp WHERE id='$id'"; 
$Ect=mysqli_query($conn,$ct);

$q_no=$_REQUEST['q_no'];

header("Location: sales_invoice.php?q_no=$q_no");
?>