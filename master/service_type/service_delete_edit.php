<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_service_type_temp where id='$id'";
$Ect=mysqli_query($conn,$ct);

$stype_no=$_REQUEST['stype_no'];

header("location:m_service_type_edit.php?stype_no=$stype_no");
?>