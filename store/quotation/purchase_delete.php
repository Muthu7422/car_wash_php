<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
echo $ct="delete from s_purchase_temp WHERE id='$id'"; 
$Ect=mysqli_query($conn,$ct);
$inv_no=$_REQUEST['inv_no'];

header("Location: s_purchase.php?inv_no=$inv_no");
?>