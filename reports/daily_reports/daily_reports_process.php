<?php
include("../../includes.php");
include("../../redirect.php");

$_POST['FromDate'];


header("location:daily_report_report.php?FromDate=".$_POST['FromDate']."");
?>