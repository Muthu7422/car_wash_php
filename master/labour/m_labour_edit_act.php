<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_labour set amt='".$_POST['amt']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_labour.php?msg=Data Saved Successfully!");
?>