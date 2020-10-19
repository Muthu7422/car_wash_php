<?php
include("../../includes.php");
include("../../redirect.php");

echo $som="update s_add_package set Status='Deactive' where Id='".$_REQUEST['Id']."'"; 
$soms=mysqli_query($conn,$som); 
$pcm=mysqli_insert_id($conn,);
exit();
header("location:package_add.php?m=Package Deleted Successfully !");
?>