<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update a_petty_cash set status='Deactive' where id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: a_petty_cash.php?d=Delete the Data Sucessfully");
?>