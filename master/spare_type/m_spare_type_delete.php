<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_spare_type  WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_spare_type_view.php?d=Delete the Data Sucessfully");
?>