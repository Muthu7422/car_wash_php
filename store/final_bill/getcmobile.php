<?php
include("../../includes.php");
  
	 //   $echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
		
		$echeck="select * from s_job_card where job_card_no = '".$_POST['inputs']."'";
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
       
	   $mobile1=$ecount['smobile'];
	   $addr=$ecount['saddress'];
	   $vehile_no=$ecount['vehicle_no'];
	   $JobcardId=$ecount['id'];
	   
	   echo json_encode(array($mobile1,$addr,$vehile_no,$JobcardId));
	  // echo $ecount['vehicle_name'];
      
?>	  


