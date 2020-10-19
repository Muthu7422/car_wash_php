<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update h_employee set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: h_employee_view.php");
?>