<?php
include("../../includes.php");
include("../../redirect.php");

$_POST['from'];
$_POST['to'];

header("location: monthly_attendance_report.php?from=".$_POST['from']."&to=".$_POST['to']."");
?>