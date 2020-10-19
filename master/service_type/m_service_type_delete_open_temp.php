<?php
include("../../includes.php");
include("../../redirect.php");

$ct="Delete from  m_service_type_temp";
$Ect=mysqli_query($conn,$ct);
header("Location: m_service_type.php");
?>