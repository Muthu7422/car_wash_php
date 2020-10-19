<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_unit_master set u_name='".$_POST['UnitType']."',u_description='".$_POST['UnitDescription']."',status='".$_POST['status']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_uom_view.php?msg=1");
?>