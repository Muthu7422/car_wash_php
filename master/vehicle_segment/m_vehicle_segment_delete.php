<?php
include("../../dbinfoi.php");

$id=$_REQUEST['Id'];
$ct="update master_vehicle_segment set status='Deactive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_vehicle_segment.php?d=Delete the Data Sucessfully");
?>