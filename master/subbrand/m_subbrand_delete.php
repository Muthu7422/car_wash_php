<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_sub_brand set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("location:m_subbrand.php?msg=Data Deleted Successfully!");
?>