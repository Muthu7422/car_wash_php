<?php
include("../../dbinfoi.php");
$job_card_no=$_REQUEST['job_card_no'];
$JobcardId=$_REQUEST['JobcardId'];

$abcd="select * from s_spare_prepick where s_job_card_no='$job_card_no' and JobcardId='$JobcardId'"; 
$dcmd=mysqli_query($conn,$abcd);
$scpd=mysqli_fetch_array($dcmd);

 $abc="select * from s_spare_prepick_details where s_pick_no='".$scpd['id']."'"; 
$dcm=mysqli_query($conn,$abc);
$scp=mysqli_fetch_array($dcm);

$ct="delete from s_spare_prepick_details where s_pick_no='".$scp['s_pick_no']."'";
$Ect=mysqli_query($conn,$ct);

$ct="delete from s_spare_prepick where s_job_card_no='$job_card_no' and JobcardId='$JobcardId'";
$Ect=mysqli_query($conn,$ct);

header("Location:s_spare_prepick_view.php?d=1");
?>