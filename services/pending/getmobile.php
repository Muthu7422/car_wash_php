<?php
include("../../includes.php");
include("../../redirect.php");    
  
       $echeck="select * from s_job_card where job_card_no = '".$_POST['inputs']."'";
       $echk=mysqli_query($conn,$echeck);
       $ecount=mysqli_fetch_array($echk); 
      
	   echo $ecount['smobile'];
      
?>	  


