<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update a_bill set status='deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: final_bill.php");
?>