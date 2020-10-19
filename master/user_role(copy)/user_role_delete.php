<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from user_role  WHERE role_id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: user_role_view.php?d=User Role deleted Sucessfully");
?>