<?php
include("../../includes.php");    
  
            $mob="select * from a_customer where mobile1='".trim($_POST['inputs1'])."' and cust_name='".trim($_POST['inputs2'])."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi); 
  
                    $mob12="select * from a_customer_vehicle_details where cust_no='".trim($mobil['id'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				  
				  
				 
					 $vtype=trim($mvf['Id']); 
				  
				  
				  
	      $echeck="select * from m_package where package_name='".$_POST['inputs']."' and v_type='$vtype' and status='Active'";  
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
     
	   echo $ecount['amount'];
      
?>	  
