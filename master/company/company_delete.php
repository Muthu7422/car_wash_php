<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update a_customer_vehicle_details set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location:customer.php");
?>