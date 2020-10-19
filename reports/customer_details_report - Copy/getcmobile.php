<?php
include("../../includes.php");
  
	 //   $echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
		
	 	$echeck="select * from a_customer where mobile1 = '".$_POST['inputs']."'";
        $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
       
	   $cname=$ecount['id'];
	  
	   
	   echo json_encode(array($cname));
	  // echo $ecount['vehicle_name'];
      
?>	  


