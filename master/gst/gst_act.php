<?php
include("../../includes.php");
include("../../redirect.php");
 $cs="select * from m_gst where gst='".$_POST['gst']."'";
$Ecs=mysqli_query($conn,$cs);
 $nr=mysqli_num_rows($Ecs);
if($nr<'1')
{
$in="insert into  m_gst set gid='".$_POST['gst_id']."',gst='".$_POST['gst']."',sgst='".$_POST['sgst']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:gst.php?s=Data Saved Successfully!");
}
else
{
header("location:gst.php?a=Data Already Exist");	
}

?>