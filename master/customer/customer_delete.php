<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
 $ct="update a_customer_vehicle_details set status='Deactive' WHERE cust_no='$id'";
$Ect=mysqli_query($conn,$ct);

$ct1="update a_customer set status='Deactive' WHERE id='$id'";
$Ect1=mysqli_query($conn,$ct1);
header("Location:customer_view.php");
?>