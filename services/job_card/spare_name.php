<?php
include("../../includes.php");

if(!empty($_POST["inputs"])) {
?>	
 <option value="">Select Services</option>
<?php 
                            $ssc1="select * from a_customer_vehicle_details where vehicle_no='".$_POST['inputs']."'";
				  $Essc1=mysqli_query($conn,$ssc1);
				 $FEssc1=mysqli_fetch_array($Essc1);
				  
				    $ssc="select * from master_vehicle_segment where VehicleSegment='".$FEssc1['VehicleSegment']."' AND status='Active'";
				  $Essc=mysqli_query($conn,$ssc);  
				while($FEssc=mysqli_fetch_array($Essc)){
					
					 $ssc2="select * from m_service_type where v_type='".$FEssc['Id']."' AND status='Active'";
				  $Essc2=mysqli_query($conn,$ssc2);  
				
					  
?>
 
<?php

 
 while($list=mysqli_fetch_array($Essc2)) {
 
 
	 
?>
 
    <option value="<?php echo $list["stype"]; ?>"><?php echo $list["stype"]; ?></option>
<?php
 }
				  }
				  
}


?>