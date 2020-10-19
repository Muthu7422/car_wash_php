<?php
include("../../includes.php");
  	$echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
	//$echeck="select a_customer.* from a_customer left join a_customer_vehicle_details on a_customer.id=a_customer_vehicle_details.cust_no where a_customer_vehicle_details.vehicle_no = '".$_POST['inputs']."'";
    $echk=mysqli_query($conn,$echeck);
    $ecount=mysqli_fetch_array($echk); 
    // echo json_encode(array($cname,$mobile1,$addr));
	
	              $ssc1="select * from master_vehicle where Id='".$ecount['VehicleModel']."'";
				  $Essc1=mysqli_query($conn,$ssc1);
				 $FEssc1=mysqli_fetch_array($Essc1);
	echo $FEssc1['VehicleModel'];
      
?>	  


