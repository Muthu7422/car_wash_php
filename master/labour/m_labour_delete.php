<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_labour set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("location:m_labour.php?msg=Data Deleted Successfully!");
?>