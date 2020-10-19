<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
$ct="update m_service_type set status='Deactive' where id='$id'";
$Ect=mysql_query($ct);

$ct1="update m_service_type_details set status='Deactive' where service_type='$id'";
$Ect1=mysql_query($ct1);

header("location:m_service_type.php");
?>