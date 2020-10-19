<?php
include("../../includes.php");
include("../../redirect.php");



header("location:indoor_outdoor_report.php?from=".$_POST['from']."&to=".$_POST['to']."&IndoorOutdoor=".$_POST['IndoorOutdoor']."");
?>