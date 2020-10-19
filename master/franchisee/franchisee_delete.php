<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_vendor set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location:franchisee.php");
?>