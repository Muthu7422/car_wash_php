<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_vendor set  WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location:franchisee.php");
?>