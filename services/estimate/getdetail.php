<?php
include("../../includes.php");
  
	 //   $echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
		
		$echeck="select * from s_spare_prepick where vehicle_no = '".$_POST['inputs']."'";

		
        $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
       
	   $cname=$ecount['job_card_no'];
	   $mobile1=$ecount['mobile'];
	   $addr=$ecount['name'];
	     $stype=$ecount['pre_pick_no'];
	   
	   echo json_encode(array($cname,$mobile1,$addr,$stype));
	  // echo $ecount['vehicle_name'];
      
?>	  


