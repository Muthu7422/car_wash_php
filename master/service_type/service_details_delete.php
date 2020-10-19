<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_service_type set status='Deactive' where id='$id'";
$Ect=mysqli_query($conn,$ct);

$ct1="update m_service_type_details set status='Deactive' where service_type='$id'";
$Ect1=mysqli_query($conn,$ct1);

header("location:m_service_type_view.php");
?>