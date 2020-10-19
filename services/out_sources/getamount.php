<?php
include("../../includes.php");
include("../../redirect.php");    
  
		$echeck="select * from m_service_type where id='".$_POST['inputs']."'"; 
        $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk);
		
      $amt=$ecount['installation_amt']+$ecount['labour_amt'];
	   echo $amt;
      
?>	  


