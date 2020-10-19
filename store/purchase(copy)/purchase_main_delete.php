<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
echo $ct="delete from s_purchase WHERE id='$id'"; 
$Ect=mysqli_query($conn,$ct);
header("Location: s_purchase_view.php");
?>