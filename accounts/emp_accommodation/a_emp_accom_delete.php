<?php
include("../../dbinfoi.php");

$id=$_REQUEST['Id'];
$ct="update emp_accom set status='Deactive' WHERE sid='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location:a_emp_accom.php?d=Delete the Data Sucessfully");
?>