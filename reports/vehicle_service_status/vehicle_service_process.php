<?php
include("../../includes.php");
include("../../redirect.php");

$_SESSION['from']=$_POST['from'];
$_SESSION['to']=$_POST['to'];
$_SESSION['ServiceStatus']=$_POST['ServiceStatus'];

header("location:vehicle_service_status.php?from=".$_POST['from']."&to=".$_POST['to']."&ServiceStatus=".$_POST['ServiceStatus']."");
?>