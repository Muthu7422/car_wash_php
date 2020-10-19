<?php
include("../../includes.php");
include("../../redirect.php");


	
 $in="update m_gst set status='".$_POST['status']."',gst='".$_POST['gst']."',sgst='".$_POST['sgst']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:gst.php?d=1");
?>