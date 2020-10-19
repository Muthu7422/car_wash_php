<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);




 $in="insert into tbl_unlimited_wash set CustomerID='".$_POST['CustomerID']."',StartDate='".$_POST['start_date']."',EndDate='".$_POST['end_date']."',status='Active'";
$Ein=mysqli_query($conn,$in);

header("location:customer_view.php?s=Date Save Sucessfully");

?>