<?php
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['submit_first']))
{
$_SESSION['from']=$_POST['from'];
$_SESSION['to']=$_POST['to'];
$_SESSION['Stype']=$_POST['Stype'];

header("location:service_type_report.php?$from='".$_SESSION['from']."'&$to='".$_SESSION['to']."'&$Stype='".$_SESSION['Stype']."'");
}
?>