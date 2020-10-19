<?php
include("../../includes.php");
include("../../redirect.php");

$ct="update s_job_card set jcard_status='Open' where job_card_no='".$_POST['job_card_no']."'"; 
$Ect=mysqli_query($conn,$ct);
header("location:s_jobcard_view_open.php");
?>