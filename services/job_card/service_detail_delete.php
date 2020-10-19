<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from s_job_card_details where id='$id'";
$Ect=mysqli_query($conn,$ct);
$ectt=mysqli_fetch_array($Ect);

header("location:s_jobcard_view.php?u=1");
?>