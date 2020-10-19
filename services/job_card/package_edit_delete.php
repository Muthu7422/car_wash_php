<?php
include("../../includes.php");

$id=$_REQUEST['id'];
$ct="delete from s_job_card_pdetails where id='$id'";
$Ect=mysqli_query($conn,$ct);

$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no && id=#pack");
?>