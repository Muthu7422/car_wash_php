<?php
include("../../dbinfoi.php");

$cid=$_REQUEST['cid'];
$ct="update a_hand_over_cash set status='Deactive' where id='$cid'";
$Ect=mysqli_query($conn,$ct);
header("Location: cash_hand_over.php?d=Delete the Data Sucessfully");
?>