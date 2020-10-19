<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update a_petty_type set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location:a_petty_type.php?d=Delete the Data Sucessfully");
?>