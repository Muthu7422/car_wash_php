<?php
include("../../includes.php");
include("../../redirect.php");

$_POST['from'];
$_POST['to'];

header("location:purchase_return_reports.php?from=".$_POST['from']."&to=".$_POST['to']."");
?>