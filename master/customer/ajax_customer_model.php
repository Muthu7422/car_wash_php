<?php
include("../../includes.php");

	 $echeck="select * from master_vehicle where VehicleModel = '".$_POST['inputs']."'";
     $echk=mysql_query($echeck);
     $ecount=mysql_fetch_array($echk);				
				
		  $d1="select * from master_vehicle_segment where Id='".$ecount['VehicleSegment']."'";
		  $dd1=mysqli_query($conn,$d1);
		  $segment=mysqli_fetch_array($dd1);
				
		      $d2="select * from m_vehicle_type where Id='".$ecount['VehicleType']."'";
		      $dd2=mysqli_query($conn,$d2);
			  $Type=mysqli_fetch_array($dd2);
				
		
	  $SegmentName=$segment['VehicleSegment'];
	  $TypeName=$Type['VehicleType'];
	  //$Id=$ecount['Id'];	
	  
	  echo json_encode(array($SegmentName,$TypeName));	   
	  //echo json_encode(array($mobile1));
	  //echo $ecount['vehicle_name'];
      
?>	  


