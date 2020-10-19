<?php
include("../../includes.php");
include("../../redirect.php");

 $in="update membership set status='Deactive' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:membership_view.php?msg=Data Deleted Successfully!");
?>