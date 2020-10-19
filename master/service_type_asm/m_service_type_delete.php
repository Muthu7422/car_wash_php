<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
$ct="update m_service_type set status='Deactive' WHERE id='$id'";
$Ect=mysql_query($ct);
header("Location: m_service_type.php");
?>