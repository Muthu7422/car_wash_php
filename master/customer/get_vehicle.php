<?php
include("../../includes.php");
include("../../redirect.php");   
  
      //$product = $_POST['product'];
      // $VehicleNo = $_POST['VehicleNo'];
	  
	  $rcheck="SELECT count(id) as vid FROM a_customer_vehicle_details where vehicle_no='".trim($_POST['VehicleNo'])."'";
	   $rechk=mysqli_query($conn,$rcheck);
       $recount=mysqli_fetch_array($rechk);
        
	     echo $Id=$recount['vid'];
	  
?>	  


