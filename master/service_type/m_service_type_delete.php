<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_service_type set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_service_type.php");
?>