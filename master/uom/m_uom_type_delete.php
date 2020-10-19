<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_REQUEST['id'];
echo $ct="update m_unit_master set status='Deactive' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_uom_view.php?d=Delete the Data Sucessfully");
?>