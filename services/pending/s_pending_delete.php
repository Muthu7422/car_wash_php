<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from pending_service where id='$id'";
$Ect=mysqli_query($conn,$ct);
header("location:s_pending_view.php?d=1");
?>