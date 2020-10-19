<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];

$emp="update h_offer_letter set status='Deactive' where  id='$id'";
$rpm=mysqli_query($conn,$emp);

header ("location:o_offerletter.php")

?>
