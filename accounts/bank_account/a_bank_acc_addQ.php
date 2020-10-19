<?php
include("../../includes.php");
include("../../redirect.php");


$in="insert into a_cash_acc set cdate='".$_POST['cdate']."',cash='".$_POST['cash']."',ledger='".$_POST['ledger']."',Status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:a_cash_acc.php?s=Data Save Sucessfully");
?>
