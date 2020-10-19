<?php 
include("../../dbinfoi.php");


$pno=$_REQUEST['package_no'];
$id=$_REQUEST['pid'];

 $echeck="delete from m_package_service where package_no='$pno'"; 	
$echk=mysqli_query($conn,$echeck);

$ct="update m_package set status='Deactive' WHERE package_no='$pno'";
$Ect=mysqli_query($conn,$ct);



header("location:package_master_view.php");
?>