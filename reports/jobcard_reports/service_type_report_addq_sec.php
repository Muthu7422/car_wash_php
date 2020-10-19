<?php
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['submit_second']))
{
$_SESSION['from_sec']=$_POST['from_sec'];
$_SESSION['to_sec']=$_POST['to_sec'];
$_SESSION['Stype_sec']=$_POST['Stype_sec'];

header("location:service_type_report.php?$from_sec='".$_SESSION['from_sec']."'&$to_sec='".$_SESSION['to_sec']."'&$Stype_sec='".$_SESSION['Stype_sec']."'");
}
?>