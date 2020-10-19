<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
$ct="delete from m_service_type_details where id='$id'";
$Ect=mysql_query($ct);

$stype_no=$_REQUEST['stype_id'];
header("location:m_service_type_edit.php?id=$stype_no");
?>