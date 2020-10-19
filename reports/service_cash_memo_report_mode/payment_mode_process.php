<?php
include("../../includes.php");
include("../../redirect.php");



header("location:service_cash_memo_report_payment_mode.php?from=".$_POST['from']."&to=".$_POST['to']."&payment_mode=".$_POST['payment_mode']."");
?>