<?php
include("../../includes.php");
include("../../redirect.php");

 $in="update m_gst set status='".$_POST['status']."',cgst='".$_POST['cgst']."',sgst='".$_POST['sgst']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:gst.php?d=1");
?>