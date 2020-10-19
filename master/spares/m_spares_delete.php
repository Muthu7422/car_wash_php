<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_spare set status='Deactive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_spares_view.php");
?>