<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="update m_complaints_type set status='Deactive' WHERE cid='$id'";
$Ect=mysqli_query($conn,$ct);
header("location: m_complaints_type.php?d=Data Delete The Sucessfully");

?>