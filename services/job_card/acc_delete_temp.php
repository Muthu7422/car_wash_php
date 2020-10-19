<?php
include("../../includes.php");

$id=$_REQUEST['id'];
$ct="delete from s_jobcard_accessories where id='$id'";
$Ect=mysqli_query($conn,$ct);

$ct1="delete from s_jobcard_accesories_main where id='$id'";
$Ect1=mysqli_query($conn,$ct1);

$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no && id=#recom1");