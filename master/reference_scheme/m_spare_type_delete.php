<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_spare_type set status='Deavtive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_spare_type.php?d=Delete the Data Sucessfully");
?>