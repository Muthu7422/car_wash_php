<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_payment_mode set status='Deavtive' WHERE Id='$Id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_payment_mode.php?d=Delete the Data Sucessfully");
?>