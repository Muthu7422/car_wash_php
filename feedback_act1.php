<?php
include("includes.php");
include("redirect.php");
/*
echo $_POST['rate'];
echo "</br>";
echo $_POST['rate1'];
echo "</br>";
echo $_POST['rate2'];
echo "</br>";
echo $_POST['rate3'];
echo "</br>";
echo $_POST['rate4'];
echo "</br>";*/
$edc="update s_job_card set q1='".$_POST['rate']."',q2='".$_POST['rate1']."',q3='".$_POST['rate2']."',q4='".$_POST['rate3']."',q5='".$_POST['rate4']."',q6='".$_POST['rate5']."',q7='".$_POST['rate6']."',RecommendUs='".$_POST['yes_no']."',Comments='".$_POST['Comments']."' where id='".$_POST['jid']."'";
$edw=mysql_query($edc);
header("Location:http://www.vertexsolution.co.in/");
?>