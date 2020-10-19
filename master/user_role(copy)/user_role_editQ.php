<?php
include("../../includes.php");
include("../../redirect.php");


echo $in="update user_role set role_name='".$_POST['role_name']."',status='".$_POST['status']."' where role_id='".$_POST['role_id']."'";
$Ein=mysqli_query($conn,$in);

header("location:user_role_view.php?msg=1");
?>