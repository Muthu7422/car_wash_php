<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $gamce="select * from a_customer where id='".$_POST['inputs']."' and status='Active'"; 
       $gamcmq=mysqli_query($conn,$gamce);
       $gamcvalue=mysqli_fetch_array($gamcmq); 
      
	   $Amcv=$gamcvalue['AMCEarned'];
	   $Amcv1=$gamcvalue['mobile1'];
       echo json_encode(array($Amcv,$Amcv1));
?>	