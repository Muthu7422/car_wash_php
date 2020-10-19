<?php 
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

$in="update s_job_card set CustomerSignature='".$_POST['edata']."' where id='".$_POST['JobCardId']."'"; 
$Ein=mysqli_query($conn,$in);
$jcn=$_POST['JobCardNo'];
header("location:s_jobcard_receipt.php?job_card_no=$jcn");
?>