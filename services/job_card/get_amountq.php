<?php
include("../../includes.php");

  	$echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
	   $echk=mysqli_query($conn,$echeck);
    $ecount=mysqli_fetch_array($echk); 

	echo $ecount['Vehiclecolor'];
      
	  
	  
?>	  


