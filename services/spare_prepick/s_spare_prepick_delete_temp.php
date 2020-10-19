<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from s_spare_prepick_temp where id='$id'";
$Ect=mysqli_query($conn,$ct);

$job_card_no=$_REQUEST['job_card_no'];
$JobcardId=$_REQUEST['JobcardId'];

header("Location:s_spare_prepick.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
?>