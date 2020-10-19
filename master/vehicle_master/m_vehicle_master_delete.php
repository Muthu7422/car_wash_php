<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_vehicle_brand set Status='Deavtive' WHERE Id='$Id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_m_vehicle_brand.php?d=Delete the Data Sucessfully");
?>