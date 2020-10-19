<?php
include("../../dbinfoi.php");

$inv_no=$_REQUEST['inv_no'];
$date=date("Y-m-d");
 $abcd="select * from s_purchase_order where inv_no='".$_REQUEST['inv_no']."'"; 
$dcmd=mysqli_query($conn,$abcd);
$scpd=mysqli_fetch_array($dcmd);



echo $ct="delete from s_purchase_order where inv_no='$inv_no'";
$Ect=mysqli_query($conn,$ct);

echo $ct="delete from s_purchase_order_details where inv_no='".$scpd['id']."'"; 
 $Ect=mysqli_query($conn,$ct);


 header("location:s_purchase_order_view.php");
?>