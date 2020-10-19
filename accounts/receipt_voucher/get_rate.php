<?php
include("../../includes.php");
include("../../redirect.php");   
  
      $product = $_POST['product'];
      $quantity = $_POST['quantity'];
	  
	 $rcheck="SELECT * FROM range_master where ProductId='$product' AND ($quantity >= RangeMin and $quantity <= RangeMax)";
	 //echo  $rcheck="SELECT RangeRate FROM range_master WHERE $rangerate > RangeMin and $rangerate < RangeMax"; 
       $rechk=mysqli_query($conn,$rcheck);
       $recount=mysqli_fetch_array($rechk);
	   
	         /* $cx="select * from master_vehicle_segment where Status='Active' AND $recount";
			 $dx=mysqli_query($conn,$cx);
			 $xd=mysqli_fetch_array($dx); */
				  
      
	  // echo $recount['RangeRate'];
	   //echo json_encode(array($recount['RangeRate']));
	   
	   $_SESSION['RangeRate']=$recount['RangeRate'];
	   // $_SESSION['DRate']=$recount['DRate'];
	   
	   echo $Id=$recount['RangeRate'];
	   // echo $DId=$recount['DRate'];
	   
	   //echo json_encode(array($Id));
      
?>	  


