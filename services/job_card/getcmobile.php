<?php
include("../../includes.php");
  
	 //   $echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
		
		$echeck="select a_customer.* from a_customer left join a_customer_vehicle_details on a_customer.id=a_customer_vehicle_details.cust_no where a_customer_vehicle_details.vehicle_no = '".$_POST['inputs']."'";

		
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
       
	   $cname=$ecount['cust_name'];
	   $mobile1=$ecount['mobile1'];
	   $addr=$ecount['addr'];
	   
	   echo json_encode(array($cname,$mobile1,$addr));
	  // echo $ecount['vehicle_name'];
      
?>	  


