<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_supplier set status='Deactive' WHERE sid='$id'"; 
$Ect=mysqli_query($conn,$ct);
header("Location: m_supplier_view.php?d=Supplier Data Delete  Sucessfully");
?>