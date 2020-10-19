<?php
include("../../includes.php");

$Rds="update s_outsources set Status='Close' where Id='".$_REQUEST['OutsourcesId']."'";
$Dwa=mysqli_query($conn,$Rds);

header("Location:out_sources_view.php?d=1");
?>