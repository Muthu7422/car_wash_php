<?php
include("../../dbinfo.php");

$id=$_REQUEST['id'];
$ct="delete from m_service_type_temp where id='$id'";
$Ect=mysql_query($ct);

$stype_no=$_REQUEST['stype_no'];

header("location:m_service_type.php?stype_no=$stype_no");
?>