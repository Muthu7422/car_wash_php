<?php
include("../../includes.php");
//   $echeck="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."' and status='Active'"; 
	//echo $_POST['inputs'];

	$echeck="select * from master_vehicle where VehicleModel = '".$_POST['inputs']."'";
    $echk=mysqli_query($conn,$echeck);
    $ecount=mysqli_fetch_array($echk); 
	
				$d="select * from m_vehicle_brand where Id='".$ecount['VehicleBrand']."'";
				$dd=mysqli_query($conn,$d);
				$brand=mysqli_fetch_array($dd);
				
				$d1="select * from master_vehicle_segment where Id='".$ecount['VehicleSegment']."'";
				$dd1=mysqli_query($conn,$d1);
				$segment=mysqli_fetch_array($dd1);
				
				$d2="select * from m_vehicle_type where Id='".$ecount['VehicleType']."'";
				$dd2=mysqli_query($conn,$d2);
				$Type=mysqli_fetch_array($dd2);
	
	
		
	$BrandName=$brand['VehicleBrand'];
	$SegmentName=$segment['VehicleSegment'];
	$TypeName=$Type['VehicleType'];
	$Id=$ecount['Id'];
	
	
	  
	echo json_encode(array($BrandName,$SegmentName,$TypeName,$Id));	   
	//echo json_encode(array($mobile1));
	  // echo $ecount['vehicle_name'];
      
?>	  


