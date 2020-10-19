<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update a_bank_acc set status='Deactive' WHERE Id='$id'"; 
$Ect=mysqli_query($conn,$ct);
header("Location: bank_account_view.php?d=Account Data Delete  Sucessfully");
?>