<?php
include("../../includes.php");
include("../../redirect.php");

 $in="update m_gst set status='Deactive' where id='".$_REQUEST['id']."'";
$Ein=mysqli_query($conn,$in);	

header("location:gst.php?msg=Data Deleted Successfully!");
?>