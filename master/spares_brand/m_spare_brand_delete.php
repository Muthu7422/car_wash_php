<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_spare_brand set status='Deactive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_spare_brand_view.php?d=Data Delete Sucessfully");
?>