<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];
$emp="update h_relieving set status='Deactive' where id='$id'";
$rpm=mysqli_query($conn,$emp);

header("location:r_relievingletter_view.php");

?>
