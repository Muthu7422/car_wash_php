<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update reference_scheme set status='Deactive' WHERE Id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: referral_scheme_view.php");
?>