<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];
$ct="update h_department set status='deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: h_department_view.php");
?>