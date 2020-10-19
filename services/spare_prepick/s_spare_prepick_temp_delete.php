<?php
include("../../includes.php");
include("../../redirect.php");


$ct="delete from s_spare_prepick_temp";
$Ect=mysqli_query($conn,$ct);

header("location:s_spare_prepick.php");
?>