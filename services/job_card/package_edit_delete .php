<?php
include("../../dbinfoi.php");



$id=$_REQUEST['id'];
 $ct="delete from s_job_card_pdetails where id='$id'";
$Ect=mysqli_query($conn,$ct);

$ser="select * from s_job_card where id='".$_REQUEST['job_card_no']."'";
$psc=mysqli_query($conn,$ser);
$rsp=mysqli_fetch_array($psc); 

$job_card_no=$rsp['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
?>