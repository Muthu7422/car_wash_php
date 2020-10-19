<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update referrer_scheme set status='Deactive' WHERE Id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: referrer_scheme_view.php");
?>