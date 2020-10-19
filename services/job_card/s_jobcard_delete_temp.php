<?php

include("../../dbinfoi.php");
session_start();


 $del="DELETE FROM s_job_card_temp WHERE session_id='".session_id()."'";
$spm=mysqli_query($conn,$del);

 $dels="DELETE FROM s_job_card_pdetails_temp WHERE session_id='".session_id()."'";
$spms=mysqli_query($conn,$dels);

 $del2="DELETE FROM s_job_card_sdetails_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

 $del2="DELETE FROM s_job_card_damge_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

 $del2="DELETE FROM s_job_card_recomdetails_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

header("location:s_jobcard_no.php");
?>