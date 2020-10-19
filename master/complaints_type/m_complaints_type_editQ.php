<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_complaints_type set ctype='".$_POST['ctype']."',cdescription='".$_POST['cdescription']."',status='".$_POST['status']."' where cid='".$_POST['cid']."'";
$Ein=mysqli_query($conn,$in);
header("location:m_complaints_type.php?s=Date Save Sucessfully");
?>