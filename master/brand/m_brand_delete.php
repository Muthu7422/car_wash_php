<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_brand set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("location:m_brand.php?msg=Data Deleted Successfully!");
?>