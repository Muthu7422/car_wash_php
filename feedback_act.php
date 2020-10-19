<?php
include("includes.php");
include("redirect.php");


$edc="update s_job_card set q1='".$_POST['q1']."',q2='".$_POST['q2']."',q3='".$_POST['q3']."',q4='".$_POST['q4']."',q5='".$_POST['q5']."' where id='".$_POST['jid']."'";
$edw=mysqli_query($conn,$edc);
header("Location:http://www.vertexsolution.co.in/");
?>