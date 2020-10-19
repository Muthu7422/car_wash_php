<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];
$job_card_no=$_REQUEST['job_card_no'];

$vd="delete from s_job_card_damge where id='$id'";
$vdq=mysqli_query($conn,$vd);
header("location:s_jobcard_edit.php?job_card_no=$job_card_no && id=#vd");
?>