<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $gamce="select * from a_customer where id='".$_POST['inputs']."' and status='Active'"; 
       $gamcmq=mysql_query($gamce);
       $gamcvalue=mysql_fetch_array($gamcmq); 
      
	   $Amcv=$gamcvalue['AMCEarned'];
       echo json_encode(array($Amcv));
?>	  
