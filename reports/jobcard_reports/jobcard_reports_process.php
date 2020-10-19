<?php
include("../../includes.php");
include("../../redirect.php");

$_POST['from'];
$_POST['to'];
$_POST['Status'];

$_SESSION['FROM']=$_POST['from'];
$_SESSION['TO']=$_POST['to'];
$_SESSION['Status']=$_POST['Status'];

header("location:jobcard_reports.php?from=".$_POST['from']."&to=".$_POST['to']."&Status=".$_POST['Status']."");
?>