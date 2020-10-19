<?php
include("../../dbinfoi.php");

$supplier=$_POST['supplier'];
$spare=$_POST['sname'];
header("Location:s_inventory.php?stype=".$_POST['stype']."&spare=".$_POST['sname']."&sbrand=".$_POST['sbrand']."");
?>