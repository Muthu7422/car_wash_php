<?php
include("../../includes.php");
include("../../redirect.php");

$ct="Delete from  m_service_type_temp";
$Ect=mysql_query($ct);
header("Location: m_service_type.php");
?>