<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_discount set status='Deavtive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_discount.php?d=Delete the Data Sucessfully");
?>