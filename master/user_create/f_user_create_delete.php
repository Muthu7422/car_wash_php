<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from f_user_create  WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: f_user_create_view.php?d=User Create Deleted Successfully Sucessfully");
?>