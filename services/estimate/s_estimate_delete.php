<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from s_estimate where id='$id'";
$Ect=mysqli_query($conn,$ct);
header("location:s_estimate.php?d=1");
?>