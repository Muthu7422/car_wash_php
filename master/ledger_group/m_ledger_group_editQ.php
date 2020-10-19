<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_spare_type set stype='".$_POST['stype']."',sdescription='".$_POST['sdescription']."',status='".$_POST['status']."' where sid='".$_POST['sid']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_spare_type.php?msg=1");
?>