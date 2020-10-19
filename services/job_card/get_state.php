<?php
include("../../includes.php");

 $echeck1="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs1']."' and status='Active'"; 
	   $echk1=mysqli_query($conn,$echeck1);
    $ecount1=mysqli_fetch_array($echk1); 

	echo $ecount1['state'];
      
?>