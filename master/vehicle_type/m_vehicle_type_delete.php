<?php
include("../../dbinfoi.php");

$id=$_REQUEST['Id'];
$ct="update m_vehicle_type set status='Deactive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_vehicle_type.php?d=Delete the Data Sucessfully");
?>